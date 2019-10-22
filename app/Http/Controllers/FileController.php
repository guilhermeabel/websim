<?php
namespace WebSim\Http\Controllers;

use Auth;
use \Crypt;
use WebSim\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
<<<<<<< Updated upstream
use Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use WebSim\File;
=======
>>>>>>> Stashed changes

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< Updated upstream
        $user = Auth::user();
        $files = DB::table('files')->where('userId', '=', $user->id)->get();

        return view('files', compact('files'));
=======
        $user = Auth::user(); //Pega o usuário atual
        $files = File::get()->where('user_id', '=', $user->id); // Pega todos os arquivos do usuário atual
        return view('files', compact('files')); // Envia esses arquivos para a view 'files'
    }
    public function createFile()
    {
        $user = Crypt::encrypt(Auth::user()->id); // Pega a id do usuário atual e encripta essa id para passar para o formulario
        $mode = Crypt::encrypt(0);
        return view('form', compact('user', 'mode')); // Retorna a view 'form' e passa para ela a id de 'user' e o 'mode' de envio
>>>>>>> Stashed changes
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        return view('form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'userId' => 'required',
            'file' => 'required|min:0.0009',
            'file.*' => 'mimes:txt',
            'name' => 'required',
        ]);
<<<<<<< Updated upstream

        if (($request->file('file')->extension()) == null) {
            return back()
                ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
        }

        if ($request->hasfile('file')) {
            $file = new File;
            $file->created_at = time();
            $file->updated_at = time();
            $file->name = $request->name;
            $file->userId = $request->userId;
            $path = $request->file('file')->store('files');
            Storage::setVisibility($path, 'private');
            $file->file = $path;
            $file->save();
=======
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
                //Retorna sucesso para o formulário
                return back()->with('success', 'Arquivo enviado com sucesso.');
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
>>>>>>> Stashed changes
        }
        return back()
            ->with('success', 'Arquivo enviado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        $file_raw = fopen("../storage/app/files/teste.txt", "r") or die("Unable to open file!");
        $items = explode("\n", fread($file_raw, filesize("../storage/app/files/teste.txt")));
        fclose($file_raw);
        return view('info', compact('file', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \WebSim\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
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
}