@extends('layouts.backend')

{{-- Define o título da página --}}
@section('title', 'Criar Nota')

@section('content')

{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    <h1>Criar Nota</h1>
    {{-- Caminho de navegação --}}
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('backend.notas.index') }}">Notas</a>
        <span>/</span> Criar
    </div>
</div>

{{-- Exibe erros de validação --}}
@if($errors->any())
<div class="alert alert-error">
    @foreach($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
</div>
@endif

{{-- Formulário de cadastro --}}
<form method="POST" action="{{ route('backend.notas.store') }}">
    @csrf

    {{-- Seleção da turma --}}
    <div class="form-group">
        <label class="form-label">Turma</label>
        <select name="turma_id" class="form-control" id="select-turma">
            <option value="">Selecione a turma</option>
            @foreach($turmas as $turma)
                <option value="{{ $turma->id }}" {{ old('turma_id') == $turma->id ? 'selected' : '' }}>
                    {{ $turma->nome }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Seleção do aluno --}}
    <div class="form-group">
        <label class="form-label">Aluno</label>
        <select name="aluno_id" class="form-control" id="select-aluno">
            <option value="">Selecione primeiro a turma</option>
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}" data-turma="{{ $aluno->turma_id }}" {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                    {{ $aluno->nome }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Campo disciplina --}}
    <div class="form-group">
        <label class="form-label">Disciplina</label>
        <input type="text" name="disciplina" class="form-control" value="{{ old('disciplina') }}" placeholder="Ex: Matemática">
    </div>

    {{-- Escolha do período --}}
    <div class="form-group">
        <label class="form-label">Período</label>
        <select name="periodo" class="form-control">
            <option value="1">1º Bimestre</option>
            <option value="2">2º Bimestre</option>
            <option value="3">3º Bimestre</option>
            <option value="4">4º Bimestre</option>
        </select>
    </div>

    {{-- Nota da primeira prova --}}
    <div class="form-group">
        <label class="form-label">Prova 1</label>
        <input type="number" name="prova1" step="0.1" min="0" max="10" class="form-control" value="{{ old('prova1', 0) }}">
    </div>

    {{-- Nota da segunda prova --}}
    <div class="form-group">
        <label class="form-label">Prova 2</label>
        <input type="number" name="prova2" step="0.1" min="0" max="10" class="form-control" value="{{ old('prova2', 0) }}">
    </div>

    {{-- Nota do trabalho --}}
    <div class="form-group">
        <label class="form-label">Trabalho</label>
        <input type="number" name="trabalho" step="0.1" min="0" max="10" class="form-control" value="{{ old('trabalho', 0) }}">
    </div>

    {{-- Botão de envio --}}
    <button type="submit" class="btn btn-primary" style="width:100%">Criar Nota</button>
</form>

@endsection

@section('scripts')
<script>
    // Seleciona os elementos
    const selectTurma = document.getElementById('select-turma');
    const selectAluno = document.getElementById('select-aluno');

    // Guarda todos os alunos
    const todosAlunos = Array.from(selectAluno.options);

    // Filtra alunos conforme a turma escolhida
    selectTurma.addEventListener('change', function () {
        const turmaId = this.value;
        selectAluno.innerHTML = '';

        const placeholder = document.createElement('option');
        placeholder.value = '';
        placeholder.textContent = turmaId ? 'Selecione o aluno' : 'Selecione primeiro a turma';
        selectAluno.appendChild(placeholder);

        if (turmaId) {
            todosAlunos
                .filter(opt => opt.dataset.turma === turmaId)
                .forEach(opt => selectAluno.appendChild(opt.cloneNode(true)));
        }
    });

    // Mantém os dados ao atualizar a página
    if (selectTurma.value) {
        selectTurma.dispatchEvent(new Event('change'));
    }
</script>
@endsection