@extends('layouts.backend')

@section('title', 'Alunos — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Alunos</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Alunos
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div style="display:flex;justify-content:flex-end;margin-bottom:1rem;">
    <a href="{{ route('backend.alunos.create') }}" class="btn btn-primary btn-sm">+ Novo Aluno</a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>RA</th>
                    <th>E-mail</th>
                    <th>Turma</th>
                </tr>
            </thead>
            <tbody>
                @forelse($alunos as $i => $aluno)
                    <tr>
                        <td class="td-number">{{ $alunos->firstItem() + $i }}</td>
                        <td class="td-name">{{ $aluno->nome }}</td>
                        <td>{{ $aluno->ra }}</td>
                        <td>{{ $aluno->email }}</td>
                        <td>{{ $aluno->turma->nome ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="color:var(--gray-400);text-align:center;padding:2rem;">Nenhum aluno cadastrado.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if($alunos->hasPages())
    <div class="pagination">
        @if($alunos->onFirstPage())
            <span>&#8249;</span>
        @else
            <a href="{{ $alunos->previousPageUrl() }}">&#8249;</a>
        @endif
        @foreach($alunos->getUrlRange(1, $alunos->lastPage()) as $page => $url)
            @if($page == $alunos->currentPage())
                <span class="page-current">{{ $page }}</span>
            @else
                <a href="{{ $url }}">{{ $page }}</a>
            @endif
        @endforeach
        @if($alunos->hasMorePages())
            <a href="{{ $alunos->nextPageUrl() }}">&#8250;</a>
        @else
            <span>&#8250;</span>
        @endif
    </div>
@endif

@endsection