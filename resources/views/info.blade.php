@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        @if ($file)
                        <h1 class="display-4">Detalhes do arquivo</h1>
                        <p class="lead">Essas são as informações sobre o arquivo selecionado</p>
                        <hr class="my-4">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        <!-- <p>É possível realizar a plotagem dos dados, ver informações sobre o arquivo ou excluí-lo por aqui</p> -->
                        <div class="mb-5 pt-2">
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item p-0">
                                    <div class="p-3 float-left">{{$file->name}}</div>
                                    <div class="float-right p-2">
                                        <a href="#" class="btn rounded-0 btn-dark">Simular</a>
                                        <a href="#" class="btn rounded-0 btn-dark">Visualizar</a>
                                        <form class="form-button" action="{{url('files', [$file->id])}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn rounded-0 btn-dark">Delete</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <p class="lead">
                            <a class="btn btn-dark btn-lg" href="{{ route('files.create') }}"
                                role="button">Adicionar</a>
                            <a class="btn btn-light btn-lg" href="{{url()->previous()}}" role="button">Voltar</a>
                        </p>
                        @else
                        <p class="lead">O arquivo não existe.</p>
                        @endif
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