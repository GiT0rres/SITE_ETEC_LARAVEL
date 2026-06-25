@extends('layouts.backend')

/** Define o título da página */
@section('title', 'Editar Evento')

@section('content')

/** Container principal */

<div class="container-fluid">

```
/** Cabeçalho da página */
<div class="d-flex justify-content-between align-items-center mb-4">

    <h1 class="h3">
        Editar Evento
    </h1>

    /** Botão para voltar */
    <a
        href="{{ route('backend.eventos.index') }}"
        class="btn btn-secondary"
    >
        <i class="bi bi-arrow-left"></i>
        Voltar
    </a>

</div>

/** Card com formulário */
<div class="card shadow-sm">

    <div class="card-body">

        /** Formulário para atualizar evento */
        <form
            action="{{ route('backend.eventos.update', $evento) }}"
            method="POST"
        >

            /** Proteção CSRF */
            @csrf

            /** Define método PUT */
            @method('PUT')

            /** Campo nome */
            <div class="mb-3">

                <label for="nome" class="form-label">
                    Nome
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="text"
                    name="nome"
                    id="nome"
                    class="form-control @error('nome') is-invalid @enderror"
                    value="{{ old('nome', $evento->nome) }}"
                    required
                >

                /** Exibe erro */
                @error('nome')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            /** Campo data */
            <div class="mb-3">

                <label for="data" class="form-label">
                    Data
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="data"
                    id="data"
                    class="form-control @error('data') is-invalid @enderror"
                    value="{{ old('data', $evento->data->format('Y-m-d')) }}"
                    required
                >

                @error('data')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            /** Campo local */
            <div class="mb-3">

                <label for="local" class="form-label">
                    Local
                </label>

                <input
                    type="text"
                    name="local"
                    id="local"
                    class="form-control @error('local') is-invalid @enderror"
                    value="{{ old('local', $evento->local) }}"
                >

                @error('local')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            /** Campo vagas */
            <div class="mb-3">

                <label for="vagas" class="form-label">
                    Vagas
                </label>

                <input
                    type="number"
                    name="vagas"
                    id="vagas"
                    min="0"
                    class="form-control @error('vagas') is-invalid @enderror"
                    value="{{ old('vagas', $evento->vagas) }}"
                >

                @error('vagas')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            /** Campo descrição */
            <div class="mb-3">

                <label for="descricao" class="form-label">
                    Descrição
                </label>

                <textarea
                    name="descricao"
                    id="descricao"
                    rows="4"
                    class="form-control @error('descricao') is-invalid @enderror"
                >{{ old('descricao', $evento->descricao) }}</textarea>

                @error('descricao')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>

            /** Botões de ação */
            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    <i class="bi bi-check-lg"></i>
                    Salvar Alterações
                </button>

                <a
                    href="{{ route('backend.eventos.index') }}"
                    class="btn btn-secondary"
                >
                    Cancelar
                </a>

            </div>

        </form>

    </div>

</div>
```

</div>

@endsection
