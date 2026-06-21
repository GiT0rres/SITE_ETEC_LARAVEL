@extends('layouts.backend')

@section('title', 'Criar Evento')

@section('content')

<div class="backend-page-header">
    <h1>Criar Evento</h1>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('backend.eventos.store') }}">
    @csrf

    <div class="form-group">
        <label class="form-label">Nome do Evento</label>
        <input
            type="text"
            name="nome"
            class="form-control"
            value="{{ old('nome') }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Data</label>
        <input
            type="date"
            name="data"
            class="form-control"
            value="{{ old('data') }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Descrição</label>
        <textarea
            name="descricao"
            class="form-control"
            rows="4"
        >{{ old('descricao') }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">
        Criar
    </button>
</form>

@endsection