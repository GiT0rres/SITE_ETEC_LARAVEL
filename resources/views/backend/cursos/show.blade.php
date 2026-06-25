@extends('layouts.backend')

/** Define o título usando o nome do curso */
@section('title', $curso->nome . ' — ETEC Zona Leste')

@section('content')

/** Seção principal dos detalhes do curso */

<section class="curso-detalhe">

```
<div class="container">

    /** Caminho de navegação */
    <div class="breadcrumb">

        <a href="{{ route('home') }}">
            Home
        </a>

        <span>/</span>

        <a href="{{ route('cursos.index') }}">
            Cursos
        </a>

        <span>/</span>

        /** Nome do curso atual */
        {{ $curso->nome }}

    </div>

    /** Área principal dividida entre imagem e informações */
    <div class="curso-detalhe-grid">

        /** Área da imagem */
        <div class="curso-detalhe-img">

            /** Verifica se existe imagem */
            @if ($curso->imagem)

                <img
                    src="{{ Storage::url($curso->imagem) }}"
                    alt="{{ $curso->nome }}"
                >

            @else

                /** Exibe espaço padrão */
                <div class="card-img-placeholder">
                    Imagem
                </div>

            @endif

        </div>

        /** Área das informações */
        <div class="curso-detalhe-info">

            /** Tipo do curso */
            <span class="card-tag">
                {{ $curso->tipo }}
            </span>

            /** Nome do curso */
            <h1>
                {{ $curso->nome }}
            </h1>

            /** Descrição */
            <p class="curso-detalhe-desc">
                {{ $curso->descricao }}
            </p>

            /** Lista de informações extras */
            <ul class="curso-detalhe-meta">

                /** Mostra duração se existir */
                @if ($curso->duracao)

                    <li>
                        <strong>Duração:</strong>
                        {{ $curso->duracao }}
                    </li>

                @endif

                /** Mostra vagas se existir */
                @if ($curso->vagas)

                    <li>
                        <strong>Vagas:</strong>
                        {{ $curso->vagas }}
                    </li>

                @endif

            </ul>

            /** Botão para inscrição */
            <a
                href="{{ route('formulario.index') }}"
                class="btn btn-primary btn-lg"
            >
                Inscreva-se
            </a>

        </div>

    </div>

</div>
```

</section>

@endsection
