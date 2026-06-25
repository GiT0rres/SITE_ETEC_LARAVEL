@extends('layouts.backend')

/** Define o título da página */
@section('title', 'Editar Nota')

@section('content')

/** Cabeçalho da página */

<div class="backend-page-header">

```
<h1>Editar Nota</h1>

/** Navegação entre páginas */
<div class="breadcrumb">

    <a href="{{ route('backend.dashboard') }}">
        Dashboard
    </a>

    <span>/</span>

    <a href="{{ route('backend.notas.index') }}">
        Notas
    </a>

    <span>/</span>

    Editar

</div>
```

</div>

/** Exibe erros caso existam */
@if($errors->any())

<div class="alert alert-error">

```
@foreach($errors->all() as $error)

    <div>{{ $error }}</div>

@endforeach
```

</div>

@endif

/** Card com informações da nota */

<div class="table-card">

```
<div class="filtros-bar">

    /** Nome do aluno */
    <div>

        <div class="stat-label">Aluno</div>

        <div class="td-name">
            {{ $nota->aluno->nome }}
        </div>

    </div>

    /** Turma do aluno */
    <div>

        <div class="stat-label">Turma</div>

        <div class="td-name">
            {{ $nota->turma->nome }}
        </div>

    </div>

    /** Disciplina */
    <div>

        <div class="stat-label">Disciplina</div>

        <div class="td-name">
            {{ $nota->disciplina }}
        </div>

    </div>

    /** Bimestre */
    <div>

        <div class="stat-label">Período</div>

        <div class="td-name">
            {{ $nota->periodo }}º Bimestre
        </div>

    </div>

    /** Média atual */
    <div>

        <div class="stat-label">Média Atual</div>

        <div class="td-media">
            {{ number_format($nota->media, 1) }}
        </div>

    </div>

</div>

/** Formulário de edição */
<form method="POST" action="{{ route('backend.notas.update', $nota) }}">

    @csrf

    @method('PUT')

    <div class="filtros-bar">

        /** Campo prova 1 */
        <div class="form-group">

            <label class="form-label">
                Prova 1
            </label>

            <input
                type="number"
                name="prova1"
                step="0.1"
                min="0"
                max="10"
                class="form-control"
                value="{{ old('prova1', $nota->prova1) }}"
            >

        </div>

        /** Campo prova 2 */
        <div class="form-group">

            <label class="form-label">
                Prova 2
            </label>

            <input
                type="number"
                name="prova2"
                step="0.1"
                min="0"
                max="10"
                class="form-control"
                value="{{ old('prova2', $nota->prova2) }}"
            >

        </div>

        /** Campo trabalho */
        <div class="form-group">

            <label class="form-label">
                Trabalho
            </label>

            <input
                type="number"
                name="trabalho"
                step="0.1"
                min="0"
                max="10"
                class="form-control"
                value="{{ old('trabalho', $nota->trabalho) }}"
            >

        </div>

        /** Botão salvar */
        <button
            type="submit"
            class="btn-filtrar"
        >

            Salvar

        </button>

        /** Botão cancelar */
        <a
            href="{{ route('backend.notas.index') }}"
            class="btn-filtrar"
            style="background:var(--gray-200);color:var(--gray-700);"
        >

            Cancelar

        </a>

    </div>

</form>
```

</div>

/** Área para exclusão */

<div class="table-card">

```
<div class="filtros-bar">

    <span class="stat-label">

        Zona de Perigo

    </span>

    /** Formulário excluir */
    <form
        method="POST"
        action="{{ route('backend.notas.destroy', $nota) }}"
        onsubmit="return confirm('Tem certeza que deseja excluir esta nota? Esta ação não pode ser desfeita.')"
    >

        @csrf

        @method('DELETE')

        <button
            type="submit"
            class="btn-filtrar"
            style="background:#dc2626;"
        >

            Excluir esta Nota

        </button>

    </form>

</div>
```

</div>

@endsection
