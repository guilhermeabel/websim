<?php
namespace WebSim\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use WebSim\File;
use WebSim\Plot;

class PlotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Apenas usuários autenticados podem acessar
    }

    public function plot(Request $request)
    {
        
        if ($request->distributions){
            $distributions = implode(", ", $request->distributions);
        
        

            $items = $request->data;
            $json = json_encode($items);
            $process = new Process("python ../resources/python/basic_dist.py {$json}");
            $process->run();
    
            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
            
            $items = json_decode($process->getOutput());
            
            $plot = new Plot;
            $plot->file_id = $request->file_id;
            $plot->data = $items;
            $plot->name = "plot-basico-".time();
            $plot->created_at = time();
            $plot->updated_at = time();
            $plot->save();
            
            return view('result', compact('items'));
            
            $file = File::find($request->file_id);
            
    
            $file->plot = $distributions;
            $file->save();
        }
        
    }

    public function dist(File $file)
    {
        return view('dist', compact('file')); // Envia o arquivo selecionado para a view 'dist'
    }

    public function results()
    {
        // $user = Auth::user(); //Pega o usuário atual
        // // $files = File::get()->where('user_id', '=', $user->id);
        // $plots = Plot::all();

        // foreach ($plots as $plot) {
        //     dd($plot);
        // }
        // $plots = Plot::get()->where('file_id', '=', $user->id);
        $plots = File::with('plots')->get();
        return view('results', compact('plots')); // Envia os plots selecionado para a view 'results'
        // return view('results'); // Envia os plots selecionado para a view 'results'
    }
}