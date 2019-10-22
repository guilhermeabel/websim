@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Dados</h1>
                        <p class="lead">Esses são os dados que você salvou</p>
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
<<<<<<< Updated upstream
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
=======
                                <div class="card list-group">
                                    <div class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="p-1">{{$file->name}}</h5>
                                            <small
                                                class="text-muted">{{ Carbon\Carbon::parse($file->created_at)->format('d/m/Y H:i') }}</small>
                                        </div>
                                        <p class="mb-1">
                                            <div class="d-flex justify-content-start">
                                                <form action="/dist/{{ $file->id }}" method="GET">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button
                                                        class="btn badge badge-pill btn-light badge-primary">Selecionar</button>
                                                </form>
                                                <button class="btn badge badge-pill btn-light badge-info"
                                                    data-toggle="modal" data-target="#infoModal">Informações</button>
                                                <form action="{{url('files', [$file->id])}}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit"
                                                        class="btn badge badge-pill btn-light badge-danger">Excluir</button>
                                                </form>
                                            </div>
                                        </p>
                                        <hr class="my-1">
                                        <small class="text-muted">
                                            {{$file->data}}
                                        </small>
                                    </div>
                                </div>
                                <div class="modal fade" id="infoModal" tabindex="-1" role="dialog"
                                    aria-labelledby="infoModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="infoModalLabel">Informações sobre {{$file->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($file->plot == false)
                                                Esse arquivo ainda não foi plotado.
                                                @elseif($file->plot)
                                                O arquivo possui já possui a(s) seguinte(s) plotagem(ns):
                                                <br> <b>{{$file->plot}}</b>
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
>>>>>>> Stashed changes
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
