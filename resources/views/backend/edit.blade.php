@extends('layouts.backend')

@section('title', 'Editar Nota — ETEC Zona Leste')

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

<div class="table-card" style="padding:2rem;max-width:560px;">
    <form action="{{ route('backend.notas.update', $nota->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom:1.5rem;">
            <p style="font-size:14px;color:var(--gray-600);">
                <strong>Aluno:</strong> {{ $nota->aluno->nome ?? '—' }}<br>
                <strong>Turma:</strong> {{ $nota->turma->nome ?? '—' }}<br>
                <strong>Disciplina:</strong> {{ $nota->disciplina }}
            </p>
        </div>

        <div class="form-group">
            <label class="form-label" for="prova1">Prova 1</label>
            <input type="number" id="prova1" name="prova1" step="0.1" min="0" max="10"
                   class="form-control {{ $errors->has('prova1') ? 'is-invalid' : '' }}"
                   value="{{ old('prova1', $nota->prova1) }}">
            @error('prova1')<p class="invalid-feedback">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="prova2">Prova 2</label>
            <input type="number" id="prova2" name="prova2" step="0.1" min="0" max="10"
                   class="form-control {{ $errors->has('prova2') ? 'is-invalid' : '' }}"
                   value="{{ old('prova2', $nota->prova2) }}">
            @error('prova2')<p class="invalid-feedback">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="trabalho">Trabalho</label>
            <input type="number" id="trabalho" name="trabalho" step="0.1" min="0" max="10"
                   class="form-control {{ $errors->has('trabalho') ? 'is-invalid' : '' }}"
                   value="{{ old('trabalho', $nota->trabalho) }}">
            @error('trabalho')<p class="invalid-feedback">{{ $message }}</p>@enderror
        </div>

        <div style="display:flex;gap:10px;margin-top:1.5rem;">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('backend.notas.index') }}" class="btn btn-outline">Cancelar</a>
        </div>
    </form>
</div>

@endsection