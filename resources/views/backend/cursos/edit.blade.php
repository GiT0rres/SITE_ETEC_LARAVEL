@extends('layouts.backend')
@section('title', 'Editar Curso')
@section('content')

<div class="backend-page-header">
    <h1>Editar Curso</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('backend.cursos.index') }}">Cursos</a>
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

<div style="display:grid;grid-template-columns:1fr 300px;gap:1.5rem;align-items:start;">

    <div class="table-card" style="padding:1.75rem;">
        <form method="POST" action="{{ route('backend.cursos.update', $curso) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="form-label">Nome do Curso</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $curso->nome) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control">{{ old('descricao', $curso->descricao) }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Tipo</label>
                <select name="tipo" class="form-control">
                    <option value="tecnico"        {{ old('tipo', $curso->tipo) == 'tecnico'        ? 'selected' : '' }}>Técnico</option>
                    <option value="especializacao"  {{ old('tipo', $curso->tipo) == 'especializacao'  ? 'selected' : '' }}>Especialização</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Duração</label>
                <input type="text" name="duracao" class="form-control" value="{{ old('duracao', $curso->duracao) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Vagas</label>
                <input type="number" name="vagas" class="form-control" value="{{ old('vagas', $curso->vagas) }}">
            </div>

            <div class="form-group">
                <label class="form-label">Imagem do Curso</label>
                @if($curso->imagem)
                    <img src="{{ asset('storage/' . $curso->imagem) }}"
                         alt="{{ $curso->nome }}"
                         style="display:block;width:100%;max-height:180px;object-fit:cover;border-radius:8px;margin-bottom:10px;border:1px solid var(--gray-200);">
                @endif
                <input type="file" name="imagem" class="form-control" accept="image/*">
            </div>

            <div class="form-group">
                <label class="form-label" style="display:flex;align-items:center;gap:8px;cursor:pointer;">
                    <input type="checkbox" name="ativo" value="1" {{ old('ativo', $curso->ativo) ? 'checked' : '' }}>
                    Curso ativo (visível no site)
                </label>
            </div>

            <div style="display:flex;gap:10px;">
                <button type="submit" class="btn btn-primary" style="flex:1">Salvar Alterações</button>
                <a href="{{ route('backend.cursos.index') }}" class="btn btn-outline" style="flex:1;text-align:center;">Cancelar</a>
            </div>
        </form>
    </div>

    <div class="table-card" style="padding:1.25rem;">
        <div class="stat-label" style="margin-bottom:10px;">Zona de Perigo</div>
        <form method="POST" action="{{ route('backend.cursos.destroy', $curso) }}"
              onsubmit="return confirm('Tem certeza que deseja excluir este curso? Esta ação não pode ser desfeita.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    style="width:100%;background:none;border:1.5px solid #fecaca;color:#dc2626;border-radius:6px;padding:9px 16px;font-size:13px;font-weight:600;cursor:pointer;font-family:'Inter',sans-serif;transition:all 0.2s;"
                    onmouseover="this.style.background='#fef2f2'"
                    onmouseout="this.style.background='none'">
                Excluir este Curso
            </button>
        </form>
    </div>

</div>

@endsection