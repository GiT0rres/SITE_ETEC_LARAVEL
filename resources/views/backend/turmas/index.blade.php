@extends('layouts.backend')

@section('title', 'Turmas — ETEC Zona Leste')

@section('content')

<!-- Cabeçalho da página -->
<div class="backend-page-header">

    <h1>Turmas</h1>

    <!-- Navegação em formato de caminho -->
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        Turmas
    </div>

</div>

<!-- Exibição da mensagem de sucesso -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Botão para criar uma nova turma -->
<div class="filtros-bar">
    <a
        href="{{ route('backend.turmas.create') }}"
        class="btn-filtrar"
    >
        + Nova Turma
    </a>
</div>

<!-- Card contendo tabela de turmas -->
<div class="table-card">

    <!-- Área responsiva da tabela -->
    <div class="table-responsive">

        <table>

            <!-- Cabeçalho da tabela -->
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

            <!-- Corpo da tabela -->
            <tbody>

                <!-- Lista todas as turmas -->
                @forelse($turmas as $i => $turma)

                    <tr>

                        <!-- Número sequencial -->
                        <td class="td-number">
                            {{ $turmas->firstItem() + $i }}
                        </td>

                        <!-- Imagem da turma -->
                        <td>

                            @if($turma->imagem)

                                <img
                                    src="{{ asset('storage/' . $turma->imagem) }}"
                                    alt="{{ $turma->nome }}"
                                    style="width:48px;height:36px;object-fit:cover;border-radius:4px;border:1px solid var(--gray-200);">

                            @else

                                <!-- Caso não exista imagem -->
                                <span style="color:var(--gray-300);font-size:12px;">
                                    —
                                </span>

                            @endif

                        </td>

                        <!-- Nome da turma -->
                        <td class="td-name">
                            {{ $turma->nome }}
                        </td>

                        <!-- Curso vinculado -->
                        <td>
                            {{ $turma->curso->nome ?? '—' }}
                        </td>

                        <!-- Período da turma -->
                        <td>
                            {{ ucfirst($turma->periodo) }}
                        </td>

                        <!-- Ano da turma -->
                        <td>
                            {{ $turma->ano }}
                        </td>

                        <!-- Quantidade de alunos -->
                        <td>
                            {{ $turma->alunos_count }}
                        </td>

                        <!-- Botões de ações -->
                        <td>

                            <!-- Editar -->
                            <a
                                href="{{ route('backend.turmas.edit', $turma) }}"
                                class="btn-edit"
                                title="Editar"
                            >
                                ✏️
                            </a>

                            <!-- Excluir -->
                            <form
                                method="POST"
                                action="{{ route('backend.turmas.destroy', $turma) }}"
                                onsubmit="return confirm('Tem certeza que deseja excluir esta turma?')"
                                style="display:inline;"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-edit"
                                    title="Excluir"
                                >
                                    🗑️
                                </button>

                            </form>

                        </td>

                    </tr>

                <!-- Caso não existam registros -->
                @empty

                    <tr>

                        <td
                            colspan="8"
                            style="color:var(--gray-400);text-align:center;padding:2rem;"
                        >

                            Nenhuma turma cadastrada.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- Paginação -->
    {{ $turmas->links() }}

</div>

@endsection