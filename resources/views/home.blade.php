@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card border-0 shadow mb-4 rounded">
                <div class="jumbotron jumbotron-fluid mb-0 rounded">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Iniciando</h1>
                        <p class="lead">Comece a usar o WebSim</p>
                        <hr class="my-3">
                        <p class="lead">
                            <a class="btn btn-outline-secondary btn-lg" href="{{ route('files.index') }}"
                                role="button">Acessar</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow mb-5 rounded">
                <div class="jumbotron jumbotron-fluid mb-0 rounded">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Distribuições de probabilidade</h1>
                        <p class="lead">Aqui é possível aprender mais sobre as distribuições aplicadas pela ferramenta
                        </p>
                        <hr class="my-4">
                        <p></p>
                        <p class="lead">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#exampleModal">Como funciona?</button>
                        </p>
                    </div>
                </div>
            </div>




        </div>
    </div>
</div>
@endsection