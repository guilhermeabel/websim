@extends('layouts.app') 
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Enviar arquivo</h1>
                        <p class="lead">Aqui é feito o envio de novos arquivos para plotagens</p>
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
                        @endif

                        @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('danger') }}
                        </div> 
                        @endif

                        <p>É necessário enviar um arquivo em formato de texto plano para que os dados sejam analisados corretamente</p>
                        <p class="lead mb-2 mt-2">Selecione um arquivo em formato <span class="code">.txt</span></p>
                        <div class="col-12 p-0">
                            <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="userId" value="{{ $user->id }}">
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
                                <button type="submit" class="ml-0 btn btn-dark btn-lg" role="button">Salvar</button>
                                <a class="btn btn-outline-secondary btn-lg" href="{{ route('files.index') }}" role="button">Visualizar</a>
                                <a class="btn btn-light btn-lg" href="{{url()->previous()}}" role="button">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
