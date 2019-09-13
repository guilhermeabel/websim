@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-12">
            <div class="card border-0 mb-4 rounded">
                <div class="jumbotron jumbotron-fluid bg-white shadow-lg mb-0 rounded">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Ferramentas de simulação</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                            its parent.</p>
                        <hr class="my-4">
                        <div class="mb-3">
                            <p>It uses utility classes for typography and spacing to space content out within the larger
                                container.</p>
                            <form class="col-12 p-0">

                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Gamma_distribution_pdf.svg/325px-Gamma_distribution_pdf.svg.png"
                                                class="card-img" alt="...">
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
                                                    <input type="checkbox" class="custom-control-input" id="gamma"
                                                        name="gamma">
                                                    <label class="custom-control-label" for="gamma">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Weibull_PDF.svg/325px-Weibull_PDF.svg.png"
                                                class="card-img" alt="...">
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
                                                    <input type="checkbox" class="custom-control-input" id="weibull"
                                                        name="weibull">
                                                    <label class="custom-control-label" for="weibull">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Erlang_dist_pdf.svg/325px-Erlang_dist_pdf.svg.png"
                                                class="card-img" alt="...">
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
                                                    <input type="checkbox" class="custom-control-input" id="erlang"
                                                        name="erlang">
                                                    <label class="custom-control-label" for="erlang">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-3 p-3 col-12 mb-4 rounded">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 p-3">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Weibull_PDF.svg/325px-Weibull_PDF.svg.png"
                                                class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">Johnsons <i class=""></i></h5>
                                                <p class="card-text">This is a wider card with supporting text below as
                                                    a natural lead-in to additional content. This content is a little
                                                    bit longer.</p>
                                                <p class="card-text"><small class="text-muted">Last updated 3 mins
                                                        ago</small></p>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="johnsons"
                                                        name="johnsons">
                                                    <label class="custom-control-label"
                                                        for="johnsons">Selecionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="menu" role="button">Simular</a>
                            <a class="btn btn-light btn-lg" href="{{url()->previous()}}" role="button">Voltar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection