@extends('layouts.backend')

@section('title', 'Gerenciar Notas — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Gerenciar Notas</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Notas
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

{{-- FILTROS --}}
<form action="{{ route('backend.notas.index') }}" method="GET">
    <div class="filtros-bar">
        <select name="turma_id">
            <option value="">Selecione a turma</option>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>

        <select name="disciplina">
            <option value="">Selecione a disciplina</option>
            @foreach($disciplinas as $disc)
                <option value="{{ $disc }}" {{ request('disciplina') === $disc ? 'selected' : '' }}>
                    {{ $disc }}
                </option>
            @endforeach
        </select>

        <select name="periodo">
            <option value="">Selecione o período</option>
            <option value="1" {{ request('periodo') == '1' ? 'selected' : '' }}>1º Semestre</option>
            <option value="2" {{ request('periodo') == '2' ? 'selected' : '' }}>2º Semestre</option>
        </select>

        <button type="submit" class="btn-filtrar">Filtrar</button>
    </div>
</form>

{{-- TABELA --}}
<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Aluno</th>
                    <th>Prova 1</th>
                    <th>Prova 2</th>
                    <th>Trabalho</th>
                    <th>Média</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notas as $i => $nota)
                    <tr>
                        <td class="td-number">{{ $notas->firstItem() + $i }}</td>
                        <td class="td-name">{{ $nota->aluno->nome ?? '—' }}</td>
                        <td class="td-nota">{{ number_format($nota->prova1, 1) }}</td>
                        <td class="td-nota">{{ number_format($nota->prova2, 1) }}</td>
                        <td class="td-nota">{{ number_format($nota->trabalho, 1) }}</td>
                        <td class="td-media">{{ number_format($nota->media, 1) }}</td>
                        <td>
                            <a href="{{ route('backend.notas.edit', $nota->id) }}" class="btn-edit" title="Editar">&#9998;</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="color:var(--gray-400);text-align:center;padding:2.5rem;">
                            Nenhuma nota encontrada para os filtros selecionados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- PAGINAÇÃO --}}
@if($notas->hasPages())
    <div class="pagination">
        @if($notas->onFirstPage())
            <span>&#8249;</span>
        @else
            <a href="{{ $notas->previousPageUrl() }}">&#8249;</a>
        @endif

        @foreach($notas->getUrlRange(1, $notas->lastPage()) as $page => $url)
            @if($page == $notas->currentPage())
                <span class="page-current">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach

        @if($notas->hasMorePages())
            <a href="{{ $notas->nextPageUrl() }}">&#8250;</a>
        @else
            <span>&#8250;</span>
        @endif
    </div>
@endif

@endsection