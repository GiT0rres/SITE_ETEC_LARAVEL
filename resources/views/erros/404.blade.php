@extends('layouts.backend')

@section('title', 'Página não encontrada')

@section('content')
    <div class="container text-center mt-5">
        <h1>404</h1>
        <h3>Página não encontrada</h3>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Voltar para a página inicial
        </a>
    </div>
@endsection
/** Rota fallback */