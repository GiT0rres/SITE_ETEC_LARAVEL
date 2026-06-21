@extends('layouts.backend')

@section('title', 'Configurações — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Configurações</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Configurações
    </div>
</div>

<div class="table-card" style="padding:2rem;max-width:560px;">
    <p style="color:var(--gray-600);font-size:14px;">Configurações do sistema em desenvolvimento.</p>
</div>

@endsection