@extends('layouts.backend')

@section('title', 'Turmas — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Turmas</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Turmas
    </div>
</div>

<div style="display:flex;justify-content:flex-end;margin-bottom:1rem;">
    <a href="{{ route('backend.turmas.create') }}" class="btn btn-primary btn-sm">
    + Nova Turma
</a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Período</th>
                    <th>Ano</th>
                    <th>Total Alunos</th>
                </tr>
            </thead>
            <tbody>
                @forelse($turmas as $i => $turma)
                    <tr>
                        <td class="td-number">{{ $turmas->firstItem() + $i }}</td>
                        <td class="td-name">{{ $turma->nome }}</td>
                        <td>{{ ucfirst($turma->periodo) }}</td>
                        <td>{{ $turma->ano }}</td>
                        <td>{{ $turma->alunos_count }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="color:var(--gray-400);text-align:center;padding:2rem;">Nenhuma turma cadastrada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection