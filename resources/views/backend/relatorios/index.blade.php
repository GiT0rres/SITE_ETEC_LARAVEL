@extends('layouts.backend')

/** Define o título da página */
@section('title', 'Relatórios — ETEC Zona Leste')

@section('content')

/** Cabeçalho da página */

<div class="backend-page-header">

```
<h1>Relatórios</h1>

/** Navegação */
<div class="breadcrumb">

    <a href="{{ route('backend.dashboard') }}">
        Dashboard
    </a>

    <span>/</span>

    Relatórios

</div>
```

</div>

/** Card principal */

<div class="table-card">

```
/** Título da seção */
<div style="padding:1.25rem 1.5rem;border-bottom:1px solid var(--gray-200);">

    <h2
        style="
        font-family:'Sora',sans-serif;
        font-size:1rem;
        font-weight:700;
        color:var(--black);
        "
    >

        Média por Turma

    </h2>

</div>

/** Área da tabela */
<div class="table-responsive">

    <table>

        /** Cabeçalho */
        <thead>

            <tr>

                <th>Turma</th>

                <th>Média Geral</th>

                <th>Situação</th>

            </tr>

        </thead>

        /** Corpo */
        <tbody>

            /** Percorre as médias */
            @forelse($mediasPorTurma as $item)

            <tr>

                /** Nome da turma */
                <td class="td-name">

                    {{ $item->turma->nome ?? '—' }}

                </td>

                /** Média calculada */
                <td class="td-media">

                    {{ number_format($item->media_turma, 1) }}

                </td>

                /** Situação conforme média */
                <td>

                    @if($item->media_turma >= 5)

                    <span
                        style="
                        background:#d1fae5;
                        color:#065f46;
                        padding:3px 10px;
                        border-radius:20px;
                        font-size:12px;
                        font-weight:600;
                        "
                    >

                        Aprovada

                    </span>

                    @else

                    <span
                        style="
                        background:#fee2e2;
                        color:#991b1b;
                        padding:3px 10px;
                        border-radius:20px;
                        font-size:12px;
                        font-weight:600;
                        "
                    >

                        Atenção

                    </span>

                    @endif

                </td>

            </tr>

            /** Caso não tenha dados */
            @empty

            <tr>

                <td
                    colspan="3"
                    style="
                    color:var(--gray-400);
                    text-align:center;
                    padding:2rem;
                    "
                >

                    Sem dados disponíveis.

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>
```

</div>

@endsection
