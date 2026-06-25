@extends('layouts.backend')

@section('title', 'Configurações — ETEC Zona Leste')

@section('content')

<!-- Cabeçalho da página -->
<div class="backend-page-header">

    <h1>Configurações</h1>

    <!-- Navegação em formato de caminho -->
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">
            Dashboard
        </a>

        <span>/</span>

        Configurações
    </div>

</div>

<!-- Card principal da área de configurações -->
<div
    class="table-card"
    style="padding:2rem;max-width:560px;"
>

    <!-- Texto informativo -->
    <p
        style="color:var(--gray-600);font-size:14px;"
    >
        Configurações do sistema em desenvolvimento.
    </p>

</div>

@endsection