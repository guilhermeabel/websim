<?php
namespace WebSim\Http\Controllers;

use Auth;
use \Crypt;
use Storage;
use WebSim\File;
use WebSim\Plot;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user(); //Pega o usuário atual
        $files = File::get()->where('user_id', '=', $user->id); // Pega todos os arquivos do usuário atual
        $plots = File::with('plots')->get();
        return view('files', compact('files', 'plots')); // Envia esses arquivos para a view 'files'
    }
    public function createFile()
    {
        $user = Crypt::encrypt(Auth::user()->id); // Pega a id do usuário atual e encripta essa id para passar para o formulario
        $mode = Crypt::encrypt(0);
        return view('form', compact('user', 'mode')); // Retorna a view 'form' e passa para ela a id de 'user' e o 'mode' de envio
    }

    
    public function createData()
    {
        $user = Crypt::encrypt(Auth::user()->id); // Pega a id do usuário atual e encripta essa id para passar para o formulario
        $mode = Crypt::encrypt(1);
        return view('form', compact('user', 'mode')); // Retorna a view 'form' e passa para ela a id de 'user' e o 'mode' de envio
    }

    public function create()
    {
        $user = Auth::user();
        return view('form', compact('user'));
    }

    public function store(Request $request)
    {
        if (Crypt::decrypt($request->mode)) { // Testa o tipo de dado a ser guardado (arquivo ou dígito) ----- true == digito, false == arquivo
            // Validação dos dados da request
            $this->validate($request, [
                'user_id' => 'required',
                'data' => 'required',
                'name' => 'required',
            ]);

            if (preg_match('/^[^,]*(?:,[^,]+)*$/', $request->data)) { // Verifica se o conteúdo dos dígitos corresponde ao regex e retorna o array de números
                $id = Crypt::decrypt($request->user_id); //Decripta o id do usuário
                $file = new File;
                $file->created_at = time();
                $file->updated_at = time();
                $file->name = $request->name;
                $file->user_id = $id;
                $data = preg_replace("/[\s-]+/", " ", $request->data);
                $data = preg_replace("/[\s_]/", ";", $data);
                $file->data = $data;
                $file->save();

                $data_array = explode(";", $data);
                $json = json_encode($data_array);
                $process = new Process("python ../resources/python/basic_dist.py {$json}");
                $process->run();
        
                // executes after the command finishes
                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }
                
                $data = json_decode($process->getOutput());
                $plot = new Plot;
                $plot->file_id = $file->id;
                $plot->name = "basic_dist";
                $plot->content = $data;
                $plot->created_at = time();
                $plot->updated_at = time();
                $plot->save();     
                
                
                //Retorna sucesso para o formulário
                return back()->with('success', 'Dados enviados com sucesso.');

            } else {
                return back()
                    ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
            }
        } else {
            // Validação dos dados da request
            $this->validate($request, [
                'user_id' => 'required',
                'file' => 'required|min:0.0009',
                'file.*' => 'mimes:txt',
                'name' => 'required',
            ]);
            // Mais uma validação bruta, por garantia
            if (($request->file('file')->extension()) == null) {
                return back()
                    ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
            }
            // Criação do arquivo no banco
            if ($request->hasfile('file')) {
                $data = fopen($request->file, "r");
                $stat = fstat($data);
                $file_data = fread($data, $stat['size']);
                fclose($data);
                if (preg_match('/^[^,]*(?:,[^,]+)*$/', $file_data)) {
                    $id = Crypt::decrypt($request->user_id);
                    $file = new File;
                    $file->created_at = time();
                    $file->updated_at = time();
                    $file->name = $request->name;
                    $file->user_id = $id;
                    $data = preg_replace("/[\s-]+/", " ", $file_data);
                    $data = preg_replace("/[\s_]/", ";", $data);
                    $file->data = $data;
                    $file->save();
                } else {
                    return back()
                        ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
                }
            } else {
                return back()
                    ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
            }
            //Retorna sucesso para o formulário
            return back()->with('success', 'Arquivo enviado com sucesso.');
        }//Retorna sucesso para o formulário
        return back()
            ->with('success', 'Arquivo enviado com sucesso.');
    }


    public function destroy(Request $request, File $file)
    {
        $file->delete();
        $request->session()->flash('message', 'Arquivo excluído com sucesso!');
        return back()
            ->with('success', 'Arquivo excluído com sucesso.');
    }
}