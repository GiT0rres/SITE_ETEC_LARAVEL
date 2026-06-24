@extends('layouts.backend')
@section('title', 'Notas — ETEC Zona Leste')
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

<form method="GET" action="{{ route('backend.notas.index') }}">
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
            @foreach($disciplinas as $disciplina)
                <option value="{{ $disciplina }}" {{ request('disciplina') == $disciplina ? 'selected' : '' }}>
                    {{ $disciplina }}
                </option>
            @endforeach
        </select>

        <select name="periodo">
            <option value="">Selecione o período</option>
            <option value="1" {{ request('periodo') == '1' ? 'selected' : '' }}>1º Bimestre</option>
            <option value="2" {{ request('periodo') == '2' ? 'selected' : '' }}>2º Bimestre</option>
            <option value="3" {{ request('periodo') == '3' ? 'selected' : '' }}>3º Bimestre</option>
            <option value="4" {{ request('periodo') == '4' ? 'selected' : '' }}>4º Bimestre</option>
        </select>

        <button type="submit" class="btn-filtrar">Filtrar</button>

        <a href="{{ route('backend.notas.create') }}" class="btn btn-primary btn-sm">+ Nova Nota</a>
    </div>
</form>

<div class="table-card">
    <div class="table-responsive">
        <table>
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
            <tbody>
                @forelse($notas as $i => $nota)
                    <tr>
                        <td class="td-number">{{ $notas->firstItem() + $i }}</td>
                        <td class="td-name">{{ $nota->aluno->nome }}</td>
                        <td>{{ $nota->turma->nome }}</td>
                        <td>{{ $nota->disciplina }}</td>
                        <td class="td-nota">{{ number_format($nota->prova1, 1) }}</td>
                        <td class="td-nota">{{ number_format($nota->prova2, 1) }}</td>
                        <td class="td-nota">{{ number_format($nota->trabalho, 1) }}</td>
                        <td class="td-media">{{ number_format($nota->media, 1) }}</td>
                        <td>
                            <a href="{{ route('backend.notas.edit', $nota) }}" class="btn-edit" title="Editar">✏️</a>
                            <form method="POST" action="{{ route('backend.notas.destroy', $nota) }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta nota?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-edit" title="Excluir">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Nenhuma nota encontrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $notas->withQueryString()->links() }}
</div>

@endsection