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

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="filtros-bar">
    <a href="{{ route('backend.turmas.create') }}" class="btn-filtrar">+ Nova Turma</a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Período</th>
                    <th>Ano</th>
                    <th>Total Alunos</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($turmas as $i => $turma)
                    <tr>
                        <td class="td-number">{{ $turmas->firstItem() + $i }}</td>
                        <td>
                            @if($turma->imagem)
                                <img src="{{ asset('storage/' . $turma->imagem) }}"
                                     alt="{{ $turma->nome }}"
                                     style="width:48px;height:36px;object-fit:cover;border-radius:4px;border:1px solid var(--gray-200);">
                            @else
                                <span style="color:var(--gray-300);font-size:12px;">—</span>
                            @endif
                        </td>
                        <td class="td-name">{{ $turma->nome }}</td>
                        <td>{{ $turma->curso->nome ?? '—' }}</td>
                        <td>{{ ucfirst($turma->periodo) }}</td>
                        <td>{{ $turma->ano }}</td>
                        <td>{{ $turma->alunos_count }}</td>
                        <td>
                            <a href="{{ route('backend.turmas.edit', $turma) }}" class="btn-edit" title="Editar">✏️</a>
                            <form method="POST" action="{{ route('backend.turmas.destroy', $turma) }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir esta turma?')"
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-edit" title="Excluir">🗑️</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" style="color:var(--gray-400);text-align:center;padding:2rem;">
                            Nenhuma turma cadastrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $turmas->links() }}
</div>

@endsection