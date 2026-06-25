@extends('layouts.backend')

@section('title', 'Dashboard — ETEC Zona Leste')

@section('content')

<!-- Cabeçalho da página -->
<div class="backend-page-header">

    <h1>Dashboard</h1>

    <!-- Caminho de navegação -->
    <div class="breadcrumb">
        Início
    </div>

</div>

<!-- Área com cartões de estatísticas -->
<div class="stats-grid">

    <!-- Total de alunos -->
    <div class="stat-card">

        <div class="stat-label">
            Total de Alunos
        </div>

        <div class="stat-value">
            {{ $totalAlunos }}
        </div>

        <div class="stat-sub">
            cadastrados
        </div>

    </div>

    <!-- Total de turmas -->
    <div class="stat-card">

        <div class="stat-label">
            Turmas Ativas
        </div>

        <div class="stat-value">
            {{ $totalTurmas }}
        </div>

        <div class="stat-sub">
            em andamento
        </div>

    </div>

    <!-- Total de cursos -->
    <div class="stat-card">

        <div class="stat-label">
            Cursos
        </div>

        <div class="stat-value">
            {{ $totalCursos }}
        </div>

        <div class="stat-sub">
            disponíveis
        </div>

    </div>

</div>

<!-- Card contendo a tabela das últimas notas -->
<div class="table-card">

    <!-- Cabeçalho da tabela -->
    <div style="padding:1.25rem 1.5rem;border-bottom:1px solid var(--gray-200);">

        <h2 style="font-family:'Sora',sans-serif;font-size:1rem;font-weight:700;color:var(--black);">
            Últimas Notas Lançadas
        </h2>

    </div>

    <!-- Área responsiva -->
    <div class="table-responsive">

        <table>

            <!-- Cabeçalho -->
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

            <!-- Conteúdo -->
            <tbody>

                <!-- Percorre a lista das últimas notas -->
                @forelse($ultimasNotas as $i => $nota)

                    <tr>

                        <!-- Número sequencial -->
                        <td class="td-number">
                            {{ $i + 1 }}
                        </td>

                        <!-- Nome do aluno -->
                        <td class="td-name">
                            {{ $nota->aluno->nome ?? '—' }}
                        </td>

                        <!-- Turma -->
                        <td>
                            {{ $nota->turma->nome ?? '—' }}
                        </td>

                        <!-- Disciplina -->
                        <td>
                            {{ $nota->disciplina }}
                        </td>

                        <!-- Nota prova 1 -->
                        <td class="td-nota">
                            {{ number_format($nota->prova1, 1) }}
                        </td>

                        <!-- Nota prova 2 -->
                        <td class="td-nota">
                            {{ number_format($nota->prova2, 1) }}
                        </td>

                        <!-- Nota do trabalho -->
                        <td class="td-nota">
                            {{ number_format($nota->trabalho, 1) }}
                        </td>

                        <!-- Média final -->
                        <td class="td-media">
                            {{ number_format($nota->media, 1) }}
                        </td>

                    </tr>

                <!-- Caso não existam notas -->
                @empty

                    <tr>

                        <td
                            colspan="8"
                            style="color:var(--gray-400);text-align:center;padding:2rem;"
                        >
                            Nenhuma nota lançada.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection