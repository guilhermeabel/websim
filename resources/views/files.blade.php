@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Arquivos</h1>
                        <p class="lead">Esses são os arquivos que você salvou</p>
                        <hr class="my-4">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if($files->count())
                        <p>É possível realizar a plotagem dos dados, ver informações sobre o arquivo ou excluí-lo por aqui</p>
                        @endif
                        <div class="mb-5 pt-2">
                            <ul class="list-group list-group-flush">
                                @forelse ($files as $file)
                                <li class="list-group-item p-0">
                                    <div class="p-3 float-left">{{$file->name}}</div>
                                    <div class="float-right p-2">
                                        <a href="{{route('files.plot',[$file->id])}}" class="btn rounded-0 btn-dark">Simular</a>
                                        <a href="{{route('files.show',[$file->id])}}" class="btn rounded-0 btn-dark">Visualizar</a>
                                        <form class="form-button" action="{{url('files', [$file->id])}}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="btn rounded-0 btn-dark">Delete</button>
                                        </form>
                                    </div>
                                </li>
                                @empty
                                <p class="lead">Você ainda não possui arquivos. <br>Clique no botão adicionar para enviar
                                    novos arquivos.</p>
                                @endforelse
                            </ul>
                        </div>
                        <p class="lead">
                            <a class="btn btn-dark btn-lg" href="{{ route('files.create') }}"
                                role="button">Adicionar</a>
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
</div>
@endsection
