@extends('layouts.app')

@section('title', 'Eventos — ETEC Zona Leste')

@section('content')
    @include('components.navbar')

    <main class="page-section">
        <div class="container">

            <div class="page-header">
                <h1>Eventos</h1>
                <p>Fique por dentro dos eventos, palestras e atividades da ETEC Zona Leste.</p>
            </div>

            <div class="eventos-list">
                @forelse($eventos as $evento)
                    <div class="evento-item">
                        <div class="evento-date">
                            <div class="evento-date-day">{{ \Carbon\Carbon::parse($evento->data)->format('d') }}</div>
                            <div class="evento-date-month">{{ strtoupper(\Carbon\Carbon::parse($evento->data)->translatedFormat('M')) }}</div>
                        </div>
                        <div class="evento-info">
                            <h3 class="evento-title">{{ $evento->nome }}</h3>
                            <p class="evento-desc">{{ Str::limit($evento->descricao, 120) }}</p>
                @empty
                    <p style="color:var(--gray-400)">Nenhum evento encontrado.</p>
                @endforelse
            </div>

            {{-- PAGINAÇÃO --}}
            @if($eventos->hasPages())
                <div class="pagination">
                    @if($eventos->onFirstPage())
                        <span>&#8249;</span>
                    @else
                        <a href="{{ $eventos->previousPageUrl() }}">&#8249;</a>
                    @endif

                    @foreach($eventos->getUrlRange(1, $eventos->lastPage()) as $page => $url)
                        @if($page == $eventos->currentPage())
                            <span class="page-current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($eventos->hasMorePages())
                        <a href="{{ $eventos->nextPageUrl() }}">&#8250;</a>
                    @else
                        <span>&#8250;</span>
                    @endif
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
@endsection