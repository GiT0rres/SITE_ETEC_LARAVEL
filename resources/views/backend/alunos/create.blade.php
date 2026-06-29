@extends('layouts.backend')

{{-- Define o título da página --}}
@section('title', 'Criar Aluno — ETEC Zona Leste')

@section('content')

{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    {{-- Título --}}
    <h1>Criar Aluno</h1>
    {{-- Navegação da página --}}
    <div class="breadcrumb">
        {{-- Link para voltar à lista --}}
        <a href="{{ route('backend.alunos.index') }}">Alunos</a>
        <span>/</span> Criar
    </div>
</div>

{{-- Exibe erros de validação --}}
@if($errors->any())
<div class="alert alert-error">
    {{-- Percorre todos os erros --}}
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif

{{-- Formulário de cadastro --}}
<form method="POST" action="{{ route('backend.alunos.store') }}">
    {{-- Proteção contra ataques CSRF --}}
    @csrf

    {{-- Campo nome --}}
    <div class="form-group">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>

    {{-- Campo e-mail --}}
    <div class="form-group">
        <label class="form-label">E-mail</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
    </div>

    {{-- Campo RA --}}
    <div class="form-group">
        <label class="form-label">RA</label>
        <input type="text" name="ra" class="form-control" value="{{ old('ra') }}">
    </div>

    {{-- Campo seleção de turma --}}
    <div class="form-group">
        <label class="form-label">Turma</label>
        <select name="turma_id" class="form-control">
            {{-- Opção padrão --}}
            <option value="">Selecione uma turma</option>
            {{-- Lista todas as turmas --}}
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
            @endforeach
        </select>
    </div>

    {{-- Botão para criar aluno --}}
    <button type="submit" class="btn btn-primary" style="width:100%">Criar</button>
</form>

@endsection