<?php
namespace WebSim\Http\Controllers;

use Auth;
use WebSim\File;
use WebSim\Plot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class PlotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apenas usuários autenticados podem acessar
    }
    
    public function plot(Request $request)
    {
        // $items = $request->data;
        // $json = json_encode($items);
        // $process = new Process("python ../resources/python/plot-python.py {$json}");
        // $process->run();

        // // executes after the command finishes
        // if (!$process->isSuccessful()) {
        //     throw new ProcessFailedException($process);
        // }
        // $items = json_decode($process->getOutput());
        // return view('result');

        // $plot = new Plot;
        // $plot->created_at = time();
        // $plot->updated_at = time();
        // $plot->name = /* nome gerado na função */ 000 ;
        // $plot->file_id = $request->file_id;
        // $plot->data = $data;
        // $plot->save();

        $file = File::find($request->file_id);

        $distributions=implode(", ", $request->distributions);

        $file->plot = $distributions;
        $file->save();
    }

    public function dist(File $file)
    {
        return view('dist', compact('file')); // Envia o arquivo selecionado para a view 'dist'
    }

    public function results()
    {
        $user = Auth::user(); //Pega o usuário atual
        // $files = File::get()->where('user_id', '=', $user->id);
        $plots = Plot::all();

        foreach ($plots as $plot) {
            dd($plot);
        }
        // $plots = Plot::get()->where('file_id', '=', $user->id);
        // return view('results', compact('plots')); // Envia os plots selecionado para a view 'results'
    }
}