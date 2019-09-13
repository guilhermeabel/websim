<?php
namespace WebSim\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use WebSim\File;

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
        $user = Auth::user();
        $files = DB::table('files')->where('userId', '=', $user->id)->get();

        return view('files', compact('files'));
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
