<?php
namespace WebSim\Http\Controllers;

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

        // var_dump($request->data);
        // dd($request->data);

        if ($request->distributions) {
            //Se a Request existe
            // Cria uma variável para guardar **todas** as distribuições, para posteriormente verificar na Request quais foram selecionadas
            $all_distributions = array(
                "Beta",
                "Erlang",
                "Exponencial",
                "Gamma",
                "Johnson",
                "Normal",
                "Triangular",
                "Uniforme",
                "Weibull",
                "Lognormal",
            );

            $selected_distributions = $request->distributions; // Cria uma variável para receber as distribuições selecionadas pelo usuário
            $data_array = explode(";", $request->data); //Transforma a string de dados [do arquivo selecionado] em um array
            $data_array = array_filter($data_array); //Remove eventuais elementos vazios presentes no vetor

            foreach ($selected_distributions as $selected) { // Para cada distribuição selecionada, faz a plotagem
                if (in_array($selected, $all_distributions)) { //Se a variável selecionada está presente no array com todas as distribuições
                    $selected = strtolower($selected); // Passa para minúscula para chamar o arquivo python
                    $json = json_encode($data_array); //codificação json para executar o processo
                    $process = new Process("python3 ../resources/python/" . $selected . ".py {$json}"); // Executa o processo
                    $process->run();
                    // Após o término do comando, é verificado se terminou sem erros
                    if (!$process->isSuccessful()) {
                        throw new ProcessFailedException($process);
                    }

                    $plot = $process->getOutput();
                    dd($plot);
                }
            }

            // adiciona ao arquivo quais plotagens foram feitas
            $file = File::find($request->file_id);
            $distributions = implode(", ", $request->distributions);
            $file->dist = $distributions;
            $file->save();

            // return view('result', compact('items'));
        } else {
            return back()
                ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
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