@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Arquivos</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                            its parent.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>

                        <div class="mb-5 pt-2">
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item p-0">
                                    <div class="p-3 float-left"> Preview item . txt</div>
                                    <div class="float-right p-2">
                                        <button class="btn rounded-0 btn-dark">Simular</button>
                                        <button class="btn rounded-0 btn-dark">Visualizar</button>
                                        <button class="btn rounded-0 btn-dark">Excluir</button>
                                    </div>
                                </li>

                                <li class="list-group-item p-0">
                                    <div class="p-3 float-left"> Preview item . txt</div>
                                    <div class="float-right p-2">
                                        <button class="btn rounded-0 btn-dark">Simular</button>
                                        <button class="btn rounded-0 btn-dark">Visualizar</button>
                                        <button class="btn rounded-0 btn-dark">Excluir</button>
                                    </div>
                                </li>

                                <li class="list-group-item p-0">
                                    <div class="p-3 float-left"> Preview item . txt</div>
                                    <div class="float-right p-2">
                                        <button class="btn rounded-0 btn-dark">Simular</button>
                                        <button class="btn rounded-0 btn-dark">Visualizar</button>
                                        <button class="btn rounded-0 btn-dark">Excluir</button>
                                    </div>
                                </li>

                                <li class="list-group-item p-0">
                                    <div class="p-3 float-left"> Preview item . txt</div>
                                    <div class="float-right p-2">
                                        <button class="btn rounded-0 btn-dark">Simular</button>
                                        <button class="btn rounded-0 btn-dark">Visualizar</button>
                                        <button class="btn rounded-0 btn-dark">Excluir</button>
                                    </div>
                                </li>

                            </ul>
                        </div>

                        <p class="lead">
                            <a class="btn btn-light btn-lg" href="home" role="button">Voltar</a>
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
</div>


</div>
@endsection