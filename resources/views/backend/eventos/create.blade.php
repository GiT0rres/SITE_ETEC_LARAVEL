@extends('layouts.backend')

{{-- Define o título da página --}}
@section('title', 'Criar Evento')

@section('content')

{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    <h1>Criar Evento</h1>
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

{{-- Formulário de cadastro do evento --}}
<form method="POST" action="{{ route('backend.eventos.store') }}">
    {{-- Proteção CSRF --}}
    @csrf

    {{-- Campo nome --}}
    <div class="form-group">
        <label class="form-label">Nome do Evento</label>
        <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
    </div>

    {{-- Campo data --}}
    <div class="form-group">
        <label class="form-label">Data</label>
        <input type="date" name="data" class="form-control" value="{{ old('data') }}">
    </div>

    {{-- Campo descrição --}}
    <div class="form-group">
        <label class="form-label">Descrição</label>
        <textarea name="descricao" class="form-control" rows="4">{{ old('descricao') }}</textarea>
    </div>

    {{-- Botão para criar evento --}}
    <button type="submit" class="btn btn-primary" style="width:100%">Criar</button>
</form>

@endsection