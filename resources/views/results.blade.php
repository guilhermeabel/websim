@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Resultados</h1>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading pt-2">Lalalalalala</h5>
                            <ul>
                                <li>
                                    <p class="mb-1">Aqui estão os dados que foram plotados</p>
                                </li>

                            </ul>
                            <button type="button" class="close" data-dismiss="alert" atia-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="my-4">
                        <div class="mb-5 pt-2">
                            <ul class="list-group list-group-flush">
                                aaaaaaaaaaaaa
                            </ul>
                        </div>
                        <p class="lead">
                            <a class="btn btn-light btn-lg" href="{{url()->previous()}}" role="button">Voltar</a>
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

@endsection