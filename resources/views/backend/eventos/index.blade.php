@extends('layouts.app')

/** Define o título da página */
@section('title', 'Eventos — ETEC Zona Leste')

@section('content')

/** Importa a barra de navegação */
@include('components.navbar')

/** Conteúdo principal */

<main class="page-section">

```
<div class="container">

    /** Cabeçalho da página */
    <div class="page-header">

        <h1>Eventos</h1>

        <p>
            Fique por dentro dos eventos, palestras e atividades da ETEC Zona Leste.
        </p>

    </div>

    /** Lista de eventos */
    <div class="eventos-list">

        /** Percorre todos os eventos */
        @forelse($eventos as $evento)

        <div class="evento-item">

            /** Área da data */
            <div class="evento-date">

                /** Dia */
                <div class="evento-date-day">

                    {{ \Carbon\Carbon::parse($evento->data)->format('d') }}

                </div>

                /** Mês */
                <div class="evento-date-month">

                    {{ strtoupper(\Carbon\Carbon::parse($evento->data)->translatedFormat('M')) }}

                </div>

            </div>

            /** Informações do evento */
            <div class="evento-info">

                /** Nome */
                <h3 class="evento-title">

                    {{ $evento->nome }}

                </h3>

                /** Descrição resumida */
                <p class="evento-desc">

                    {{ Str::limit($evento->descricao, 120) }}

                </p>

            </div>

        </div>

        /** Caso não existam eventos */
        @empty

        <p style="color:var(--gray-400)">
            Nenhum evento encontrado.
        </p>

        @endforelse

    </div>

    /** Paginação */
    @if($eventos->hasPages())

    <div class="pagination">

        /** Página anterior */
        @if($eventos->onFirstPage())

            <span>&#8249;</span>

        @else

            <a href="{{ $eventos->previousPageUrl() }}">
                &#8249;
            </a>

        @endif

        /** Lista páginas */
        @foreach($eventos->getUrlRange(1, $eventos->lastPage()) as $page => $url)

            @if($page == $eventos->currentPage())

                <span class="page-current">
                    {{ $page }}
                </span>

            @else

                <a href="{{ $url }}">
                    {{ $page }}
                </a>

            @endif

        @endforeach

        /** Próxima página */
        @if($eventos->hasMorePages())

            <a href="{{ $eventos->nextPageUrl() }}">
                &#8250;
            </a>

        @else

            <span>&#8250;</span>

        @endif

    </div>

    @endif

</div>
```

</main>

/** Importa o rodapé */
@include('components.footer')

@endsection
