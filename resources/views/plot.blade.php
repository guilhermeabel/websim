@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center mb-3">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Teste de plotagem</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                            its parent.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <p class="lead">
                            <!-- <a class="btn btn-primary btn-lg" href="menu" role="button">Simular</a> -->
                        </p>
                    </div>
                </div>
                @if (true)
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        <ul>
                            @for($i = 0; $i < count($items); $i++) 
                            <li>{{ $items[$i] }}</li>
                            @endfor
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card">
                <div class="jumbotron jumbotron-fluid mb-0">
                    <div class="container pl-5 pr-5">
                        <h1 class="display-4">Meus arquivos</h1>
                        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of
                            its parent.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger
                            container.</p>
                        <p class="lead">
                        <a class="btn btn-dark btn-lg" href="{{ route('files.create') }}" role="button">Enviar</a>
                        <a class="btn btn-outline-secondary btn-lg" href="{{ route('files.index') }}" role="button">Visualizar</a>
                        </p>
                    </div>
                </div>
                 <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div> -->

</div>
@endsection