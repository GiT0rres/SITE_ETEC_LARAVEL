@extends('layouts.backend')

{{-- Define o título da página --}}
@section('title', 'Cursos — ETEC Zona Leste')

@section('content')

{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    <h1>Cursos</h1>
    {{-- Caminho de navegação --}}
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Cursos
    </div>
</div>

{{-- Exibe mensagem de sucesso --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Barra de ações --}}
<div class="filtros-bar">
    {{-- Botão para cadastrar curso --}}
    <a href="{{ route('backend.cursos.create') }}" class="btn-filtrar">
        + Novo Curso
    </a>
</div>

{{-- Card da tabela --}}
<div class="table-card">
    <div class="table-responsive">
        <table>
            {{-- Cabeçalho --}}
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
            {{-- Corpo da tabela --}}
            <tbody>
                {{-- Percorre lista de cursos --}}
                @forelse($cursos as $i => $curso)
                <tr>
                    {{-- Número da linha --}}
                    <td class="td-number">{{ $cursos->firstItem() + $i }}</td>

                    {{-- Exibe imagem do curso --}}
                    <td>
                        @if($curso->imagem)
                            <img
                                src="{{ asset('storage/' . $curso->imagem) }}"
                                alt="{{ $curso->nome }}"
                                style="width:48px;height:36px;object-fit:cover;border-radius:4px;border:1px solid var(--gray-200);"
                            >
                        @else
                            <span style="color:var(--gray-300);font-size:12px;">—</span>
                        @endif
                    </td>

                    {{-- Nome --}}
                    <td class="td-name">{{ $curso->nome }}</td>

                    {{-- Tipo --}}
                    <td>{{ ucfirst($curso->tipo) }}</td>

                    {{-- Duração --}}
                    <td>{{ $curso->duracao ?? '—' }}</td>

                    {{-- Quantidade de vagas --}}
                    <td>{{ $curso->vagas ?? '—' }}</td>

                    {{-- Status do curso --}}
                    <td>
                        @if($curso->ativo)
                            <span style="color:#166534;background:#d1fae5;padding:2px 8px;border-radius:4px;font-size:12px;font-weight:600;">
                                Ativo
                            </span>
                        @else
                            <span style="color:#991b1b;background:#fee2e2;padding:2px 8px;border-radius:4px;font-size:12px;font-weight:600;">
                                Inativo
                            </span>
                        @endif
                    </td>

                    {{-- Botões de ação --}}
                    <td>
                        {{-- Botão editar --}}
                        <a href="{{ route('backend.cursos.edit', $curso) }}" class="btn-edit" title="Editar">
                            ✏️
                        </a>

                        {{-- Formulário excluir --}}
                        <form
                            method="POST"
                            action="{{ route('backend.cursos.destroy', $curso) }}"
                            onsubmit="return confirm('Tem certeza que deseja excluir este curso?')"
                            style="display:inline;"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-edit" title="Excluir">🗑️</button>
                        </form>
                    </td>
                </tr>

                {{-- Caso não existam cursos --}}
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

    {{-- Paginação --}}
    {{ $cursos->links() }}
</div>

@endsection