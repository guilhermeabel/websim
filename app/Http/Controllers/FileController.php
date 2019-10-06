<?php
namespace WebSim\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
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

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enc_id = Auth::user()->id; // Pega a id do usuário atual
        $user = Crypt::encrypt($enc_id); //Encripta essa id para passar para o formulario
        $mode = Crypt::encrypt(0); // Define o modo de envio que o usuário escolheu (0 = arquivo txt).
        return view('form_file', compact('user', 'mode')); // Retorna a view 'form_file' e passa para ela os dados de 'user' e 'mode'
    }
    public function digit()
    {
        $enc_id = Auth::user()->id; // Pega a id do usuário atual
        $user = Crypt::encrypt($enc_id); //Encripta essa id para passar para o formulario
        $mode = Crypt::encrypt(1); // Define o modo de envio que o usuário escolheu (1 = inserção de digitos).
        return view('form_digit', compact('user', 'mode')); // Retorna a view 'form_digit' e passa para ela os dados de 'user' e 'mode'
    }
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [ 
            'mode' => 'required'
        ]);
        if (Crypt::decrypt($request->mode)){ // Testa o tipo de dado a ser guardado (arquivo ou dígito)
            // Validação dos dados da request
            $this->validate($request, [ 
                'userId' => 'required',
                'data' => 'required',
                'name' => 'required',
            ]);
            if (preg_match('/^[\d,-;]+$/', $request->data, $data)){ // Verifica se o conteúdo dos dígitos corresponde ao regex ///////////////// MELHORAR REGEX ;;--++
                $filename = $request->name . time(); // Cria um nome único para o arquivo
                $content = fopen($filename,'x+'); // Cria o arquivo
                fwrite($content, serialize($data)); // Escreve os dados digitados no arquivo
                fclose($content);
            } else {
                return back()
                    ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
            }
            $dec_id = Crypt::decrypt($request->userId);
            $file = new File;
            $file->created_at = time();
            $file->updated_at = time();
            $file->name = $request->name;
            $file->userId = $dec_id;
            Storage::put($filename, $content);
            $path = $content->store('files');
            Storage::setVisibility($path, 'private');
            $file->file = $path;
            $file->save();
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
                $dec_id = Crypt::decrypt($request->userId);
                $file = new File;
                $file->created_at = time();
                $file->updated_at = time();
                $file->name = $request->name;
                $file->userId = $dec_id;
                $path = $request->file('file')->store('files');
                Storage::setVisibility($path, 'private');
                $file->file = $path;
                $file->save();
            }
            //Retorna sucesso para o formulário
            return back()->with('success', 'Arquivo enviado com sucesso.');
        }
    }

    /**
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    // public function show(File $file)
    // {
    //     $file_raw = fopen("../storage/app/files/teste.txt", "r") or die("Não foi possível carregar o arquivo, tente enviá-lo novamente.");
    //     $items = explode("\n", fread($file_raw, filesize("../storage/app/files/teste.txt")));
    //     fclose($file_raw);
    //     return view('info', compact('file', 'items'));
    // }
    /**
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
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