@extends('layouts.backend')

@section('title', 'Relatórios — ETEC Zona Leste')

@section('content')

<div class="backend-page-header">
    <h1>Relatórios</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Relatórios
    </div>
</div>

<div class="table-card">
    <div style="padding:1.25rem 1.5rem;border-bottom:1px solid var(--gray-200);">
        <h2 style="font-family:'Sora',sans-serif;font-size:1rem;font-weight:700;color:var(--black);">Média por Turma</h2>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Turma</th>
                    <th>Média Geral</th>
                    <th>Situação</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mediasPorTurma as $item)
                    <tr>
                        <td class="td-name">{{ $item->turma->nome ?? '—' }}</td>
                        <td class="td-media">{{ number_format($item->media_turma, 1) }}</td>
                        <td>
                            @if($item->media_turma >= 5)
                                <span style="background:#d1fae5;color:#065f46;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;">Aprovada</span>
                            @else
                                <span style="background:#fee2e2;color:#991b1b;padding:3px 10px;border-radius:20px;font-size:12px;font-weight:600;">Atenção</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" style="color:var(--gray-400);text-align:center;padding:2rem;">Sem dados disponíveis.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection