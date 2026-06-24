@extends('layouts.backend')

@section('title', 'Dashboard — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Dashboard</h1>
    <div class="breadcrumb">Início</div>
</div>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-label">Total de Alunos</div>
        <div class="stat-value">{{ $totalAlunos }}</div>
        <div class="stat-sub">cadastrados</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Turmas Ativas</div>
        <div class="stat-value">{{ $totalTurmas }}</div>
        <div class="stat-sub">em andamento</div>
    </div>
    <div class="stat-card">
        <div class="stat-label">Cursos</div>
        <div class="stat-value">{{ $totalCursos }}</div>
        <div class="stat-sub">disponíveis</div>
    </div>
</div>

<div class="table-card">
    <div style="padding:1.25rem 1.5rem;border-bottom:1px solid var(--gray-200);">
        <h2 style="font-family:'Sora',sans-serif;font-size:1rem;font-weight:700;color:var(--black);">Últimas Notas Lançadas</h2>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Aluno</th>
                    <th>Turma</th>
                    <th>Disciplina</th>
                    <th>Prova 1</th>
                    <th>Prova 2</th>
                    <th>Trabalho</th>
                    <th>Média</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ultimasNotas as $i => $nota)
                    <tr>
                        <td class="td-number">{{ $i + 1 }}</td>
                        <td class="td-name">{{ $nota->aluno->nome ?? '—' }}</td>
                        <td>{{ $nota->turma->nome ?? '—' }}</td>
                        <td>{{ $nota->disciplina }}</td>
                        <td class="td-nota">{{ number_format($nota->prova1, 1) }}</td>
                        <td class="td-nota">{{ number_format($nota->prova2, 1) }}</td>
                        <td class="td-nota">{{ number_format($nota->trabalho, 1) }}</td>
                        <td class="td-media">{{ number_format($nota->media, 1) }}</td>
                    </tr>
                @empty
                    <tr><td colspan="8" style="color:var(--gray-400);text-align:center;padding:2rem;">Nenhuma nota lançada.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection