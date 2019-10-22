@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Dados</h1>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading pt-2">Importante</h5>
                            <ul>
                                <li>
                                    <p class="mb-1">Aqui estão os dados que você salvou</p>
                                </li>
                                <li>
                                    <p>É possível optar por enviar arquivos ou digitar os valores diretamente</p>
                                </li>
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" atia-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <hr class="my-4">
                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        @endif
                        @if($files->count())
                        <p>É possível realizar a plotagem dos dados, ver informações sobre o arquivo ou excluí-lo</p>
                        @endif
                        <div class="mb-5 pt-2">
                            <ul class="list-group list-group-flush">
                                @forelse ($files as $file)
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
                                                <h5 class="modal-title" id="infoModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ...
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="alert alert-info" role="alert">
                                    Você ainda não possui arquivos
                                </div>
                                @endforelse
                            </ul>
                        </div>
                        <p class="lead">
                            <a class="btn btn-dark btn-lg" href="{{ route('files.createFile') }}" role="button">Enviar
                                arquivo</a>
                            <a class="btn btn-secondary btn-lg" href="{{ route('files.createData') }}"
                                role="button">Inserir valores</a>
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