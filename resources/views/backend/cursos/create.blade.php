@extends('layouts.backend')
@section('title', 'Criar Curso')
@section('content')

<div class="backend-page-header">
    <h1>Criar Curso</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('backend.cursos.index') }}">Cursos</a>
        <span>/</span> Criar
    </div>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('backend.cursos.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label class="form-label">Nome do Curso</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>

    <div class="form-group">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
    </div>

    <div class="form-group">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-control">
            <option value="tecnico"       {{ old('tipo') == 'tecnico'       ? 'selected' : '' }}>Técnico</option>
            <option value="especializacao" {{ old('tipo') == 'especializacao' ? 'selected' : '' }}>Especialização</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Duração</label>
        <input type="text" name="duracao" class="form-control" value="{{ old('duracao') }}" placeholder="Ex: 2 anos">
    </div>

    <div class="form-group">
        <label class="form-label">Vagas</label>
        <input type="number" name="vagas" class="form-control" value="{{ old('vagas') }}">
    </div>

    <div class="form-group">
        <label class="form-label">Imagem do Curso</label>
        <input type="file" name="imagem" class="form-control" accept="image/*">
    </div>

    <div class="form-group">
        <label class="form-label" style="display:flex;align-items:center;gap:8px;cursor:pointer;">
            <input type="checkbox" name="ativo" value="1" {{ old('ativo', true) ? 'checked' : '' }}>
            Curso ativo (visível no site)
        </label>
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">Criar Curso</button>
</form>

@endsection