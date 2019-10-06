@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Enviar arquivo</h1>
                        <p class="lead">Siga as instruções abaixo para garantir o retorno de resultados coerentes</p>
                        <hr class="my-4">
                        @if (count($errors) > 0)
                        <div class="alert alert-secondary">
                            <p class="lead"><strong>Oops!</strong> Algo de errado aconteceu</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                        <div class="alert alert-success" role="alert">

                            <a class="btn btn-outline-secondary btn-lg" href="{{ route('files.index') }}"
                                role="button">Clique aqui para voltar ao menu de dados</a>
                        </div>
                        @endif

                        @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div>
                        @endif

                        <div class="d-flex justify-content-center">
                            <p>É necessário enviar um arquivo em formato <span class="code">.txt</span> para que os
                                dados sejam analisados corretamente</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>Os dígitos devem ser separados por <b>ponto e vírgula</b>, de forma análoga ao exemplo a
                                seguir</p>
                        </div>
                        <div class="p-3 d-flex justify-content-center"><span class="code" style="font-size:22px;">
                                <b>29</b>;<b>5,2</b>;<b>13</b>;<b>79</b>; </span></div>
                        <div class="d-flex justify-content-center">
                            <p class="mt-3">São admitidos <b>números inteiros</b> ou <b>com vírgula</b>,
                                <b>positivos</b> ou <b>negativos</b></p>
                        </div>

                        <hr>

                        <div class="mt-3">
                            <p class="mb-3 mt-4">Após conferir se os dados do arquivo estão de acordo com as
                                especificações, é hora de enviá-lo</p>
                            <p class="lead mb-2 mt-2">Selecione um arquivo
                                <div class="col-12 p-0">
                                    <form action="{{ route('files.store') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="userId" value="{{ $user }}">
                                        <input type="hidden" name="mode" value="{{ $mode }}">
                                        <div class="custom-file">
                                            <input id="file" name="file" accept=".txt" type="file"
                                                class="@if($errors->has('name') && !$errors->has('file')) is-valid @endif @if($errors->has('file')) is-invalid @endif custom-file-input">
                                            <label for="file" class="custom-file-label text-truncate">Arquivo...</label>
                                        </div>
                                        @if($errors->has('file'))
                                        <div class="absolutolouco-feedback">
                                            <p>Verifique o arquivo e seu formato.</p>
                                        </div>
                                        @endif
                                        {!!Form::text('name', '<p class="lead mb-0 mt-2">Dê um nome para o arquivo</p>
                                        ')->placeholder('Nome...')->id('name')!!}
                                        <button type="submit" class="ml-0 btn btn-dark btn-lg"
                                            role="button">Salvar</button>
                                        <a class="btn btn-outline-secondary btn-lg" href="{{ route('files.index') }}"
                                            role="button">Visualizar</a>
                                        <a class="btn btn-light btn-lg" href="{{url()->previous()}}"
                                            role="button">Voltar</a>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection