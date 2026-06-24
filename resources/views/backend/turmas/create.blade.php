@extends('layouts.backend')
@section('title', 'Criar Turma')
@section('content')

<div class="backend-page-header">
    <h1>Criar Turma</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('backend.turmas.index') }}">Turmas</a>
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

<form method="POST" action="{{ route('backend.turmas.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label class="form-label">Nome da Turma</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>

    <div class="form-group">
        <label class="form-label">Curso</label>
        <select name="curso_id" class="form-control">
            <option value="">Selecione o curso</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}" {{ old('curso_id') == $curso->id ? 'selected' : '' }}>
                    {{ $curso->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Período</label>
        <select name="periodo" class="form-control">
            <option value="manha"  {{ old('periodo') == 'manha'  ? 'selected' : '' }}>Manhã</option>
            <option value="tarde"  {{ old('periodo') == 'tarde'  ? 'selected' : '' }}>Tarde</option>
            <option value="noite"  {{ old('periodo') == 'noite'  ? 'selected' : '' }}>Noite</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Ano</label>
        <input type="number" name="ano" class="form-control" value="{{ old('ano', date('Y')) }}">
    </div>

    <div class="form-group">
        <label class="form-label">Imagem da Turma</label>
        <input type="file" name="imagem" class="form-control" accept="image/*">
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">Criar Turma</button>
</form>

@endsection