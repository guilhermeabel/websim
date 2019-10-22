@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="jumbotron jumbotron-fluid bg-white shadow-lg mb-0 rounded">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Distribuições de probabilidade</h1>
                        <p class="lead">Ao clicar em avançar, serão geradas a média, moda e desvio padrão para os dados
                            do arquivo, além das distribuições que forem selecionadas aqui</p>
                        <hr class="my-4">
                        <div class="mb-3">
                            <div class="card mb-3 p-3 col-12 mb-4 rounded custom-border border border-primary">

                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="card-text"><small class="text-muted">Arquivo selecionado</small>
                                            <h5 class="card-title">{{$file->name}}</h5>
                                            <p class="card-text">{{$file->data}}</p>
                                        </p>
                                        <a class="btn btn-light btn-sm" href="{{url()->previous()}}"
                                            role="button">Voltar</a>
                                    </div>
                                </div>

                            </div>
                            <hr class="my-4">
                            <p>Clique para selecionar as distribuições</p>
                            <form action="/plot/{{$file->id}}" class="col-12 p-0" method="POST">
                                @csrf
                                <!-- DADOS DE ARQUIVO E USUARIO  -->
                                <input type="hidden" name="file_id" value="{{ $file->id }}">
                                <input type="hidden" name="data" value="{{ $file->data }}">

                                <!-- DISTRIBUIÇÃO BETA ---------------------------------------------------------------------------------------------- -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/beta.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Beta</h5>
                                                <p class="card-text">A distribuição beta é uma família de distribuições
                                                    de probabilidade contínuas definidas no intervalo <b>[0,1]</b>
                                                    parametrizado por dois parâmetros positivos,
                                                    denotados
                                                    por &alpha; e &beta;, que aparecem como expoentes da variável
                                                    aleatória e controlam o formato
                                                    da distribuição.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="beta"
                                                        name="distributions[]" value="Beta">
                                                    <label class="custom-control-label" for="beta">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO ERLANG ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/erlang.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Erlang</h5>
                                                <p class="card-text">A distribuição Erlang é uma distribuição de
                                                    probabilidade contínua com uma ampla aplicabilidade, principalmente
                                                    devido à sua relação com a distribuição exponencial e a distribuição
                                                    gama.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="erlang"
                                                        name="distributions[]" value="Erlang">
                                                    <label class="custom-control-label" for="erlang">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO EXPONENCIAL ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/exponencial.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Exponencial</h5>
                                                <p class="card-text">A distribuição exponencial é um tipo de
                                                    distribuição contínua de probabilidade, representada por um
                                                    parâmetro &lambda;.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="exponencial"
                                                        name="distributions[]" value="Exponencial">
                                                    <label class="custom-control-label"
                                                        for="exponencial">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO GAMA ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/gamma.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Gama</h5>
                                                <p class="card-text"> a distribuição gama é uma família de distribuições
                                                    contínuas de probabilidade de dois parâmetros. Diversos tipos de
                                                    distribuições são dependentes, ou são casos específicos da
                                                    distribuição gama, como a distribuição exponencial e a distribuição
                                                    qui-quadrado</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="gamma"
                                                        name="distributions[]" value="Gamma">
                                                    <label class="custom-control-label" for="gamma">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO JOHNSON ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/johnson.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Johnson's</h5>
                                                <p class="card-text">A distribuição Johnson é uma família de quatro
                                                    parâmetros das distribuições de probabilidade,
                                                    investigada por N. L. Johnson em 1949, sendo uma
                                                    transformação da distribuição normal.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="johnson"
                                                        name="distributions[]" value="Johnson">
                                                    <label class="custom-control-label" for="johnson">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO NORMAL ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/normal.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Normal</h5>
                                                <p class="card-text">A distribuição normal é uma das distribuições de
                                                    probabilidade mais utilizadas para modelar fenômenos naturais. Isso
                                                    se deve ao fato de que um grande número desses eventos
                                                    apresenta sua distribuição de probabilidade tão proximamente normal,
                                                    que a ela pode ser com sucesso referida, e, portanto, com adequado
                                                    acerto por ela representada como se normal fosse.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="normal"
                                                        name="distributions[]" value="Normal">
                                                    <label class="custom-control-label" for="normal">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO TRIANGULAR ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/triangular.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Triangular</h5>
                                                <p class="card-text">A distribuição triangular é a distribuição de
                                                    probabilidade contínua que possui um valor mínimo a, um valor máximo
                                                    b e uma moda c, de modo que a função densidade de probabilidade é
                                                    zero para os extremos (a e b), e afim entre cada extremo e a moda,
                                                    de forma que o gráfico dela é um triângulo.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="triangular"
                                                        name="distributions[]" value="Triangular">
                                                    <label class="custom-control-label"
                                                        for="triangular">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO UNIFORME ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/uniforme.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Uniforme</h5>
                                                <p class="card-text">A distribuição uniforme é a distribuição de
                                                    probabilidades contínua mais simples de conceituar: a probabilidade
                                                    de se gerar qualquer ponto em um intervalo contido no espaço
                                                    amostral é proporcional ao tamanho do intervalo, visto que na
                                                    distribuição uniforme a <i>f(x)</i> é igual para qualquer valor de
                                                    <i>x</i> no
                                                    intervalo considerado.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="uniforme"
                                                        name="distributions[]" value="Uniforme">
                                                    <label class="custom-control-label"
                                                        for="uniforme">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO WEIBULL ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/weibull.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Weibull</h5>
                                                <p class="card-text">Usando essa distribuição, realizou-se a modelagem
                                                    bem sucedida de dados provenientes de grandes áreas de ciências
                                                    física, biológica, social, saúde, ambiental e métodos baseados nesta
                                                    distribuição são ferramentas indispensáveis para profissionais da
                                                    engenharia de confiabilidade. Em geral, suas aplicações visam a
                                                    determinação do
                                                    tempo de vida médio e da taxa de falhas em função do tempo da
                                                    população analisada.</p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="weibull"
                                                        name="distributions[]" value="Weibull">
                                                    <label class="custom-control-label" for="weibull">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- DISTRIBUIÇÃO LOGNORMAL ------------------------------------------------------------------------------------------------  -->
                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="/image/dist/lognormal.png"
                                                class="card-img border border-secondary image-fit" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Log-normal</h5>
                                                <p class="card-text">A importância da distribuição log-normal se deve a
                                                    um resultado análogo ao Teorema do Limite Central: assim como uma
                                                    distribuição normal aparece quando são somadas várias variáveis
                                                    independentes, a distribuição log-normal aparece naturalmente
                                                    como o produto de várias variáveis independentes.
                                                </p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="lognormal"
                                                        name="distributions[]" value="Lognormal">
                                                    <label class="custom-control-label"
                                                        for="lognormal">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="lead">
                                    <button type="submit" class="btn btn-primary btn-lg">Simular</button>
                                    <a class="btn btn-light btn-lg" href="{{url()->previous()}}"
                                        role="button">Voltar</a>
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection