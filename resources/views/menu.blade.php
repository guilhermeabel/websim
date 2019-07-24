@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Ferramentas de simulação</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                            its parent.</p>
                        <hr class="my-4">
                        <div class="mb-3">
                            <p>It uses utility classes for typography and spacing to space content out within the larger
                                container.</p>
                            <form class="col-12 p-0">

                                <div class="card mb-3 pl-0 col-12">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Gamma_distribution_pdf.svg/325px-Gamma_distribution_pdf.svg.png" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Gamma</h5>
                                                <p class="card-text">This is a wider card with supporting text below as
                                                    a natural lead-in to additional content. This content is a little
                                                    bit longer.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switch1" name="switch1">
                                                    <label class="custom-control-label" for="switch1">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 pl-0 col-12">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Weibull_PDF.svg/325px-Weibull_PDF.svg.png" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Weibull</h5>
                                                <p class="card-text">This is a wider card with supporting text below as
                                                    a natural lead-in to additional content. This content is a little
                                                    bit longer.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switch1" name="switch1">
                                                    <label class="custom-control-label" for="switch1">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 pl-0 col-12">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Erlang_dist_pdf.svg/325px-Erlang_dist_pdf.svg.png" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Erlang</h5>
                                                <p class="card-text">This is a wider card with supporting text below as
                                                    a natural lead-in to additional content. This content is a little
                                                    bit longer.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switch1" name="switch1">
                                                    <label class="custom-control-label" for="switch1">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 pl-0 col-12">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Weibull_PDF.svg/325px-Weibull_PDF.svg.png" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Johnsons</h5>
                                                <p class="card-text">This is a wider card with supporting text below as
                                                    a natural lead-in to additional content. This content is a little
                                                    bit longer.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="switch1" name="switch1">
                                                    <label class="custom-control-label" for="switch1">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="menu" role="button">Simular</a>
                        </p>
                    </div>
                </div>
                @if (session('status'))
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Meus arquivos</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                            its parent.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <p class="lead">
                            <a class="btn btn-dark btn-lg" href="{{ route('files.create') }}" role="button">Enviar</a>
                            <a class="btn btn-light btn-lg" href="{{ route('files.index') }}" role="button">Editar</a>
                        </p>
                    </div>
                </div>
                <!-- <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div> -->
            </div>
        </div>
    </div>

</div>
@endsection