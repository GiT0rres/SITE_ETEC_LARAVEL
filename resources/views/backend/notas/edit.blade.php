@extends('layouts.backend')
@section('title', 'Editar Nota')
@section('content')

<div class="backend-page-header">
    <h1>Editar Nota</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('backend.notas.index') }}">Notas</a>
        <span>/</span> Editar
    </div>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<div class="table-card">
    <div class="filtros-bar">
        <div>
            <div class="stat-label">Aluno</div>
            <div class="td-name">{{ $nota->aluno->nome }}</div>
        </div>
        <div>
            <div class="stat-label">Turma</div>
            <div class="td-name">{{ $nota->turma->nome }}</div>
        </div>
        <div>
            <div class="stat-label">Disciplina</div>
            <div class="td-name">{{ $nota->disciplina }}</div>
        </div>
        <div>
            <div class="stat-label">Período</div>
            <div class="td-name">{{ $nota->periodo }}º Bimestre</div>
        </div>
        <div>
            <div class="stat-label">Média Atual</div>
            <div class="td-media">{{ number_format($nota->media, 1) }}</div>
        </div>
    </div>

    <form method="POST" action="{{ route('backend.notas.update', $nota) }}">
        @csrf
        @method('PUT')

        <div class="filtros-bar">
            <div class="form-group">
                <label class="form-label">Prova 1</label>
                <input
                    type="number"
                    name="prova1"
                    step="0.1"
                    min="0"
                    max="10"
                    class="form-control"
                    value="{{ old('prova1', $nota->prova1) }}"
                >
            </div>
            <div class="form-group">
                <label class="form-label">Prova 2</label>
                <input
                    type="number"
                    name="prova2"
                    step="0.1"
                    min="0"
                    max="10"
                    class="form-control"
                    value="{{ old('prova2', $nota->prova2) }}"
                >
            </div>
            <div class="form-group">
                <label class="form-label">Trabalho</label>
                <input
                    type="number"
                    name="trabalho"
                    step="0.1"
                    min="0"
                    max="10"
                    class="form-control"
                    value="{{ old('trabalho', $nota->trabalho) }}"
                >
            </div>

            <button type="submit" class="btn-filtrar">Salvar</button>
            <a href="{{ route('backend.notas.index') }}" class="btn-filtrar" style="background:var(--gray-200);color:var(--gray-700);">Cancelar</a>
        </div>
    </form>
</div>

<div class="table-card">
    <div class="filtros-bar">
        <span class="stat-label">Zona de Perigo</span>
        <form method="POST" action="{{ route('backend.notas.destroy', $nota) }}"
              onsubmit="return confirm('Tem certeza que deseja excluir esta nota? Esta ação não pode ser desfeita.')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-filtrar" style="background:#dc2626;">Excluir esta Nota</button>
        </form>
    </div>
</div>

@endsection