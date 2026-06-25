@extends('layouts.backend')

@section('title', 'Editar Turma')

@section('content')

<!-- Cabeçalho da página -->
<div class="backend-page-header">
    <h1>Editar Turma</h1>

    <!-- Navegação em formato de caminho -->
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>

        <a href="{{ route('backend.turmas.index') }}">Turmas</a>
        <span>/</span>

        Editar
    </div>
</div>

<!-- Exibição dos erros de validação -->
@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<!-- Área principal dividida entre formulário e exclusão -->
<div style="display:grid;grid-template-columns:1fr 300px;gap:1.5rem;align-items:start;">

    <!-- Card com formulário de edição -->
    <div class="table-card" style="padding:1.75rem;">

        <!-- Formulário para atualizar turma -->
        <form method="POST"
              action="{{ route('backend.turmas.update', $turma) }}"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Campo nome -->
            <div class="form-group">
                <label class="form-label">Nome da Turma</label>

                <input
                    type="text"
                    name="nome"
                    class="form-control"
                    value="{{ old('nome', $turma->nome) }}"
                >
            </div>

            <!-- Seleção do curso -->
            <div class="form-group">
                <label class="form-label">Curso</label>

                <select name="curso_id" class="form-control">
                    <option value="">Selecione o curso</option>

                    @foreach($cursos as $curso)
                        <option
                            value="{{ $curso->id }}"
                            {{ old('curso_id', $turma->curso_id) == $curso->id ? 'selected' : '' }}
                        >
                            {{ $curso->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Seleção do período -->
            <div class="form-group">
                <label class="form-label">Período</label>

                <select name="periodo" class="form-control">
                    <option value="manha"
                        {{ old('periodo', $turma->periodo) == 'manha' ? 'selected' : '' }}>
                        Manhã
                    </option>

                    <option value="tarde"
                        {{ old('periodo', $turma->periodo) == 'tarde' ? 'selected' : '' }}>
                        Tarde
                    </option>

                    <option value="noite"
                        {{ old('periodo', $turma->periodo) == 'noite' ? 'selected' : '' }}>
                        Noite
                    </option>
                </select>
            </div>

            <!-- Campo ano -->
            <div class="form-group">
                <label class="form-label">Ano</label>

                <input
                    type="number"
                    name="ano"
                    class="form-control"
                    value="{{ old('ano', $turma->ano) }}"
                >
            </div>

            <!-- Exibição e envio da imagem -->
            <div class="form-group">
                <label class="form-label">Imagem da Turma</label>

                <!-- Exibe imagem atual caso exista -->
                @if($turma->imagem)
                    <img
                        src="{{ asset('storage/' . $turma->imagem) }}"
                        alt="{{ $turma->nome }}"
                        style="display:block;width:100%;max-height:180px;object-fit:cover;border-radius:8px;margin-bottom:10px;border:1px solid var(--gray-200);">
                @endif

                <!-- Upload de nova imagem -->
                <input
                    type="file"
                    name="imagem"
                    class="form-control"
                    accept="image/*"
                >
            </div>

            <!-- Botões de ação -->
            <div style="display:flex;gap:10px;">

                <button
                    type="submit"
                    class="btn btn-primary"
                    style="flex:1">
                    Salvar Alterações
                </button>

                <a
                    href="{{ route('backend.turmas.index') }}"
                    class="btn btn-outline"
                    style="flex:1;text-align:center;">
                    Cancelar
                </a>

            </div>

        </form>
    </div>

    <!-- Área de exclusão -->
    <div class="table-card" style="padding:1.25rem;">

        <div class="stat-label" style="margin-bottom:10px;">
            Zona de Perigo
        </div>

        <!-- Formulário para excluir turma -->
        <form method="POST"
              action="{{ route('backend.turmas.destroy', $turma) }}"
              onsubmit="return confirm('Tem certeza que deseja excluir esta turma? Esta ação não pode ser desfeita.')">

            @csrf
            @method('DELETE')

            <button
                type="submit"
                style="width:100%;background:none;border:1.5px solid #fecaca;color:#dc2626;border-radius:6px;padding:9px 16px;font-size:13px;font-weight:600;cursor:pointer;font-family:'Inter',sans-serif;transition:all 0.2s;"
                onmouseover="this.style.background='#fef2f2'"
                onmouseout="this.style.background='none'">

                Excluir esta Turma

            </button>

        </form>

    </div>

</div>

@endsection