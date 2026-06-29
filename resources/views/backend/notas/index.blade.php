@extends('layouts.backend')

{{-- Define o título da página --}}
@section('title', 'Notas — ETEC Zona Leste')

@section('content')

{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    <h1>Gerenciar Notas</h1>
    {{-- Navegação entre páginas --}}
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Notas
    </div>
</div>

{{-- Exibe mensagem de sucesso --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Formulário de filtros --}}
<form method="GET" action="{{ route('backend.notas.index') }}">
    <div class="filtros-bar">
        {{-- Filtro por turma --}}
        <select name="turma_id">
            <option value="">Selecione a turma</option>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{ request('turma_id') == $turma->id ? 'selected' : '' }}>
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>

        {{-- Filtro por disciplina --}}
        <select name="disciplina">
            <option value="">Selecione a disciplina</option>
            @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina }}" {{ request('disciplina') == $disciplina ? 'selected' : '' }}>
                    {{ $disciplina }}
                </option>
            @endforeach
        </select>

        {{-- Filtro por período --}}
        <select name="periodo">
            <option value="">Selecione o período</option>
            <option value="1">1º Bimestre</option>
            <option value="2">2º Bimestre</option>
            <option value="3">3º Bimestre</option>
            <option value="4">4º Bimestre</option>
        </select>

        {{-- Botão aplicar filtro --}}
        <button type="submit" class="btn-filtrar">Filtrar</button>

        {{-- Botão criar nota --}}
        <a href="{{ route('backend.notas.create') }}" class="btn btn-primary btn-sm">+ Nova Nota</a>
    </div>
</form>

{{-- Card da tabela --}}
<div class="table-card">
    <div class="table-responsive">
        <table>
            {{-- Cabeçalho --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>Aluno</th>
                    <th>Turma</th>
                    <th>Disciplina</th>
                    <th>Prova 1</th>
                    <th>Prova 2</th>
                    <th>Trabalho</th>
                    <th>Média</th>
                    <th>Ações</th>
                </tr>
            </thead>
            {{-- Dados --}}
            <tbody>
                @forelse($notas as $i => $nota)
                <tr>
                    {{-- Número --}}
                    <td class="td-number">{{ $notas->firstItem() + $i }}</td>
                    {{-- Nome --}}
                    <td class="td-name">{{ $nota->aluno->nome }}</td>
                    {{-- Turma --}}
                    <td>{{ $nota->turma->nome }}</td>
                    {{-- Disciplina --}}
                    <td>{{ $nota->disciplina }}</td>
                    {{-- Nota prova 1 --}}
                    <td class="td-nota">{{ number_format($nota->prova1, 1) }}</td>
                    {{-- Nota prova 2 --}}
                    <td class="td-nota">{{ number_format($nota->prova2, 1) }}</td>
                    {{-- Nota trabalho --}}
                    <td class="td-nota">{{ number_format($nota->trabalho, 1) }}</td>
                    {{-- Média final --}}
                    <td class="td-media">{{ number_format($nota->media, 1) }}</td>
                    {{-- Botões --}}
                    <td>
                        {{-- Editar --}}
                        <a href="{{ route('backend.notas.edit', $nota) }}" class="btn-edit" title="Editar">✏️</a>
                        {{-- Excluir --}}
                        <form
                            method="POST"
                            action="{{ route('backend.notas.destroy', $nota) }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir esta nota?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-edit" title="Excluir">🗑️</button>
                        </form>
                    </td>
                </tr>
                {{-- Caso não tenha dados --}}
                @empty
                <tr>
                    <td colspan="9">Nenhuma nota encontrada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- Paginação --}}
    {{ $notas->withQueryString()->links() }}
</div>

@endsection