@extends('layouts.backend')

@section('title', 'Criar Aluno — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Criar Aluno</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.alunos.index') }}">Alunos</a>
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

<form method="POST" action="{{ route('backend.alunos.store') }}">
    @csrf

    <div class="form-group">
        <label class="form-label">Nome</label>
        <input
            type="text"
            name="nome"
            class="form-control"
            value="{{ old('nome') }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">E-mail</label>
        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email') }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">RA</label>
        <input
            type="text"
            name="ra"
            class="form-control"
            value="{{ old('ra') }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Turma</label>
        <select name="turma_id" class="form-control">
            <option value="">Selecione uma turma</option>

            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}">
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">
        Criar
    </button>
</form>

@endsection