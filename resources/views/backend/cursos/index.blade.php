@extends('layouts.backend')
@section('title', 'Cursos — ETEC Zona Leste')
@section('content')

<div class="backend-page-header">
    <h1>Cursos</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Cursos
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="filtros-bar">
    <a href="{{ route('backend.cursos.create') }}" class="btn-filtrar">+ Novo Curso</a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Duração</th>
                    <th>Vagas</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cursos as $i => $curso)
                    <tr>
                        <td class="td-number">{{ $cursos->firstItem() + $i }}</td>
                        <td>
                            @if($curso->imagem)
                                <img src="{{ asset('storage/' . $curso->imagem) }}"
                                     alt="{{ $curso->nome }}"
                                     style="width:48px;height:36px;object-fit:cover;border-radius:4px;border:1px solid var(--gray-200);">
                            @else
                                <span style="color:var(--gray-300);font-size:12px;">—</span>
                            @endif
                        </td>
                        <td class="td-name">{{ $curso->nome }}</td>
                        <td>{{ ucfirst($curso->tipo) }}</td>
                        <td>{{ $curso->duracao ?? '—' }}</td>
                        <td>{{ $curso->vagas ?? '—' }}</td>
                        <td>
                            @if($curso->ativo)
                                <span style="color:#166534;background:#d1fae5;padding:2px 8px;border-radius:4px;font-size:12px;font-weight:600;">Ativo</span>
                            @else
                                <span style="color:#991b1b;background:#fee2e2;padding:2px 8px;border-radius:4px;font-size:12px;font-weight:600;">Inativo</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('backend.cursos.edit', $curso) }}" class="btn-edit" title="Editar">✏️</a>
                            <form method="POST" action="{{ route('backend.cursos.destroy', $curso) }}"
                                  onsubmit="return confirm('Tem certeza que deseja excluir este curso?')"
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
                            Nenhum curso cadastrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $cursos->links() }}
</div>

@endsection