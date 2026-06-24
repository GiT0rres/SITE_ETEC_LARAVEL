@extends('layouts.backend')
@section('title', $curso->nome . ' — ETEC Zona Leste')
@section('content')

<section class="curso-detalhe">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}">Home</a>
            <span>/</span>
            <a href="{{ route('cursos.index') }}">Cursos</a>
            <span>/</span>
            {{ $curso->nome }}
        </div>

        <div class="curso-detalhe-grid">
            <div class="curso-detalhe-img">
                @if ($curso->imagem)
                    <img src="{{ Storage::url($curso->imagem) }}" alt="{{ $curso->nome }}">
                @else
                    <div class="card-img-placeholder">Imagem</div>
                @endif
            </div>

            <div class="curso-detalhe-info">
                <span class="card-tag">{{ $curso->tipo }}</span>
                <h1>{{ $curso->nome }}</h1>
                <p class="curso-detalhe-desc">{{ $curso->descricao }}</p>

                <ul class="curso-detalhe-meta">
                    @if ($curso->duracao)
                        <li><strong>Duração:</strong> {{ $curso->duracao }}</li>
                    @endif
                    @if ($curso->vagas)
                        <li><strong>Vagas:</strong> {{ $curso->vagas }}</li>
                    @endif
                </ul>

                <a href="{{ route('formulario.index') }}" class="btn btn-primary btn-lg">Inscreva-se</a>
            </div>
        </div>
    </div>
</section>

@endsection