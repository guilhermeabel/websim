<?php
namespace WebSim\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WebSim\File;
use \Crypt;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apenas usuários autenticados podem acessar
    }
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user(); //Pega o usuário atual
        $files = DB::table('files')->where('userId', '=', $user->id)->get(); // Pega todos os arquivos do usuário atual
        return view('files', compact('files')); // Envia esses arquivos para a view 'files'
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

    public function store(Request $request)
    {
        $this->validate($request, [
            'mode' => 'required',
        ]);
        if (Crypt::decrypt($request->mode)) { // Testa o tipo de dado a ser guardado (arquivo ou dígito) ----- true == digito, false == arquivo
            // Validação dos dados da request
            $this->validate($request, [
                'userId' => 'required',
                'data' => 'required',
                'name' => 'required',
            ]);

            if (preg_match('/^[^,]*(?:,[^,]+)*$/', $request->file, $data)) { // Verifica se o conteúdo dos dígitos corresponde ao regex e retorna o array de números
                $id = Crypt::decrypt($request->userId); //Decripta o id do usuário
                $file = new File;
                $file->created_at = time();
                $file->updated_at = time();
                $file->name = $request->name;
                $file->userId = $id;
                $file->data = serialize($data);
                $file->save();
                //Retorna sucesso para o formulário
                return back()->with('success', 'Arquivo enviado com sucesso.');
            } else {
                return back()
                    ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
            }

        } else {
            // Validação dos dados da request
            $this->validate($request, [
                'userId' => 'required',
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
                if (preg_match('/^[^,]*(?:,[^,]+)*$/', $request->data, $data)) {
                    $id = Crypt::decrypt($request->userId);
                    $file = new File;
                    $file->created_at = time();
                    $file->updated_at = time();
                    $file->name = $request->name;
                    $file->userId = $id;
                    $file->data = serialize($data);
                    $file->save();
                }
            }
            //Retorna sucesso para o formulário
            return back()->with('success', 'Arquivo enviado com sucesso.');
        }
    }

    public function edit(File $file)
    {
        //
    }
    public function update(Request $request, File $file)
    {
        //
    }
    public function destroy(Request $request, File $file)
    {
        $file->delete();
        $request->session()->flash('message', 'Arquivo excluído com sucesso!');
        return back()
            ->with('success', 'Arquivo excluído com sucesso.');
    }

    public function plot(Request $request, File $file)
    {

        //     $file = fopen("../storage/app/files/teste.txt", "r") or die("Unable to open file!");
        //     $items = [54,5,7,34,5,445345,345,35,45,3];
        //  //   explode("\n", fread($file, filesize("../storage/app/files/teste.txt")));
        //     fclose($file);

        //     $process = new Process("C:\python374\python ../resources/python/plot-python.py {$items}");
        //     $process->run();

        //     // executes after the command finishes
        //     if (!$process->isSuccessful()) {
        //         throw new ProcessFailedException($process);
        //     }

        //     $file = $process->getOutput();
        //     // Result (string): {'neg': 0.204, 'neu': 0.531, 'pos': 0.265, 'compound': 0.1779}

        //     return view('plot', compact('file'));

        // JSON ----------------------------------------------------------------------------------------------------------------------
        $items = [54, 5, 7, 34, 5, 445345, 345, 35, 45, 3];
        $json = json_encode($items);
        $process = new Process("python ../resources/python/plot-python.py {$json}");
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        $items = json_decode($process->getOutput());
        return view('plot', compact('items'));
    }
}
