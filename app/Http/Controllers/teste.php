<?php
namespace WebSim\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use WebSim\File;
use \Crypt;

class FileController extends Controller
{
    public function store(Request $request)
    {

        if (Crypt::decrypt($request->mode)) { // Testa o tipo de dado a ser guardado(arquivo ou dígito) ----- true == digito,  false == arquivo

            // Validação dos dados da request
            $this->validate($request, [
                'user_id' => 'required',
                'data' => 'required',
                'name' => 'required',
            ]);

            $file_data = $request->data;

            if (preg_match('/^[^,]*(?:,[^,]+)*$/', $file_data)) { // Verifica se o conteúdo dos dígitos corresponde ao regex e retorna o array de números
                $id = Crypt::decrypt($request->user_id); //Decripta o id do usuário
                $file = new File;
                $file->created_at = time();
                $file->updated_at = time();
                $file->name = $request->name;
                $file->user_id = $id;
                $data = preg_replace("/[\s-]+/", " ", $file_data);
                $data = preg_replace("/[\s_]/", ";", $data);
                $file->data = $data;
                $file->save();

                // Gerando mediana, média aritmética e moda
                $data_array = explode(";", $data);
                $data_array = array_filter($data_array);
                $json = json_encode($data_array);
                $process = new Process("python ../resources/python/basic_dist.py {$json}");
                $process->run();

                if (!$process->isSuccessful()) {
                    throw new ProcessFailedException($process);
                }

                $data = $process->getOutput();
                // $data = str_replace('"', '', $data);
                // $data = explode(",", $data);

                # [0]mediana, [1]media_aritmetica, [2]desvio_padrao, [3]variancia, [4]moda

                $file->median = $data[0];
                $file->mean = $data[1];
                $file->stdev = $data[2];
                $file->var = $data[3];

                if ($data[4] == "null") {
                    $file->mode = "Não possui moda única.";
                } else {
                    $file->mode = $data[4];
                }

                $file->save();

                //Retorna sucesso para o formulário
                return back()->with('success', 'Dados enviados com sucesso.');

            } else {
                return back()
                    ->with('danger', 'Ocorreu um erro fatal, tente novamente.');
            }
        }
    }
}