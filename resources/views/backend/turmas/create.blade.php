@extends('layouts.backend')

@section('title', 'Criar Turma')

@section('content')

<div class="backend-page-header">
    <h1>Criar Turma</h1>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('backend.turmas.store') }}">
    @csrf

    <div class="form-group">
        <label class="form-label">Nome da Turma</label>
        <input
            type="text"
            name="nome"
            class="form-control"
            value="{{ old('nome') }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Curso</label>
        <select name="curso_id" class="form-control">
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Período</label>
        <select name="periodo" class="form-control">
            <option value="manha">Manhã</option>
            <option value="tarde">Tarde</option>
            <option value="noite">Noite</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Ano</label>
        <input
            type="number"
            name="ano"
            class="form-control"
            value="{{ date('Y') }}"
        >
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">
        Criar
    </button>
</form>

@endsection