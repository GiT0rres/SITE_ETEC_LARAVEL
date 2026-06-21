@extends('layouts.app')

@section('title', 'Cursos — ETEC Zona Leste')

@section('content')
    @include('components.navbar')

    <main class="page-section">
        <div class="container">

            <div class="page-header">
                <h1>Nossos Cursos</h1>
                <p>Conheça os cursos técnicos e especializações oferecidos pela ETEC Zona Leste.</p>
            </div>

            {{-- FILTROS --}}
            <div class="filter-tabs">
                <a href="{{ route('cursos.index') }}"
                   class="filter-tab {{ !request('tipo') ? 'active' : '' }}">Todos</a>
                <a href="{{ route('cursos.index', ['tipo' => 'tecnico']) }}"
                   class="filter-tab {{ request('tipo') === 'tecnico' ? 'active' : '' }}">Técnicos</a>
            </div>

            {{-- GRID --}}
            <div class="cursos-grid">
                @forelse($cursos as $curso)
                    <div class="card">
                        <div class="card-img">
                            <div class="card-img-placeholder">Imagem do Curso</div>
                        </div>
                        <div class="card-body">
                            <span class="card-tag">{{ ucfirst($curso->tipo) }}</span>
                            <h3 class="card-title">{{ $curso->nome }}</h3>
                            <p class="card-desc">{{ Str::limit($curso->descricao, 80) }}</p>
                            <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-outline btn-sm">Saiba Mais</a>
                        </div>
                    </div>
                @empty
                    <p style="color:var(--gray-400);grid-column:1/-1">Nenhum curso encontrado.</p>
                @endforelse
            </div>

            {{-- PAGINAÇÃO --}}
            @if($cursos->hasPages())
                <div class="pagination">
                    @if($cursos->onFirstPage())
                        <span>&#8249;</span>
                    @else
                        <a href="{{ $cursos->previousPageUrl() }}">&#8249;</a>
                    @endif

                    @foreach($cursos->getUrlRange(1, $cursos->lastPage()) as $page => $url)
                        @if($page == $cursos->currentPage())
                            <span class="page-current">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if($cursos->hasMorePages())
                        <a href="{{ $cursos->nextPageUrl() }}">&#8250;</a>
                    @else
                        <span>&#8250;</span>
                    @endif
                </div>
            @endif

        </div>
    </main>

    @include('components.footer')
@endsection