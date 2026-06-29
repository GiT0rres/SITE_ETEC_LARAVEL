@extends('layouts.backend')
{{-- Define o título da página --}}
@section('title', 'Criar Curso')
@section('content')
{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    {{-- Título --}}
    <h1>Criar Curso</h1>
    {{-- Navegação entre páginas --}}
    <div class="breadcrumb">
        {{-- Link dashboard --}}
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        {{-- Link lista de cursos --}}
        <a href="{{ route('backend.cursos.index') }}">Cursos</a>
        <span>/</span> Criar
    </div>
</div>

{{-- Exibe erros de validação --}}
@if($errors->any())
<div class="alert alert-error">
    {{-- Percorre lista de erros --}}
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif

{{-- Formulário de cadastro --}}
<form method="POST" action="{{ route('backend.cursos.store') }}" enctype="multipart/form-data">
    {{-- Proteção contra ataques CSRF --}}
    @csrf
    {{-- Campo nome --}}
    <div class="form-group">
        <label class="form-label">Nome do Curso</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>
    {{-- Campo descrição --}}
    <div class="form-group">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
    </div>
    {{-- Campo tipo --}}
    <div class="form-group">
        <label class="form-label">Tipo</label>
        <select name="tipo" class="form-control">
            <option value="tecnico" {{ old('tipo') == 'tecnico' ? 'selected' : '' }}>Técnico</option>
            <option value="especializacao" {{ old('tipo') == 'especializacao' ? 'selected' : '' }}>Especialização</option>
        </select>
    </div>
    {{-- Campo duração --}}
    <div class="form-group">
        <label class="form-label">Duração</label>
        <input type="text" name="duracao" class="form-control" value="{{ old('duracao') }}" placeholder="Ex: 2 anos">
    </div>
    {{-- Campo vagas --}}
    <div class="form-group">
        <label class="form-label">Vagas</label>
        <input type="number" name="vagas" class="form-control" value="{{ old('vagas') }}">
    </div>
    {{-- Campo upload de imagem --}}
    <div class="form-group">
        <label class="form-label">Imagem do Curso</label>
        <input type="file" name="imagem" class="form-control" accept="image/*">
    </div>
    {{-- Campo status do curso --}}
    <div class="form-group">
        <label class="form-label" style="display:flex;align-items:center;gap:8px;cursor:pointer;">
            <input type="checkbox" name="ativo" value="1" {{ old('ativo', true) ? 'checked' : '' }}>
            Curso ativo (visível no site)
        </label>
    </div>
    {{-- Botão para criar curso --}}
    <button type="submit" class="btn btn-primary" style="width:100%">Criar Curso</button>
</form>
@endsection