@extends('layouts.backend')
@section('title', 'Criar Nota')
@section('content')

<div class="backend-page-header">
    <h1>Criar Nota</h1>
    <div class="breadcrumb">
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span>
        <a href="{{ route('backend.notas.index') }}">Notas</a>
        <span>/</span> Criar
    </div>
</div>

@if($errors->any())
    <div class="alert alert-error">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('backend.notas.store') }}">
    @csrf

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

    <div class="form-group">
        <label class="form-label">Aluno</label>
        <select name="aluno_id" class="form-control" id="select-aluno">
            <option value="">Selecione primeiro a turma</option>
            @foreach($alunos as $aluno)
                <option value="{{ $aluno->id }}"
                    data-turma="{{ $aluno->turma_id }}"
                    {{ old('aluno_id') == $aluno->id ? 'selected' : '' }}>
                    {{ $aluno->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Disciplina</label>
        <input
            type="text"
            name="disciplina"
            class="form-control"
            value="{{ old('disciplina') }}"
            placeholder="Ex: Matemática"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Período</label>
        <select name="periodo" class="form-control">
            <option value="1" {{ old('periodo') == '1' ? 'selected' : '' }}>1º Bimestre</option>
            <option value="2" {{ old('periodo') == '2' ? 'selected' : '' }}>2º Bimestre</option>
            <option value="3" {{ old('periodo') == '3' ? 'selected' : '' }}>3º Bimestre</option>
            <option value="4" {{ old('periodo') == '4' ? 'selected' : '' }}>4º Bimestre</option>
        </select>
    </div>

    <div class="form-group">
        <label class="form-label">Prova 1</label>
        <input
            type="number"
            name="prova1"
            step="0.1"
            min="0"
            max="10"
            class="form-control"
            value="{{ old('prova1', 0) }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Prova 2</label>
        <input
            type="number"
            name="prova2"
            step="0.1"
            min="0"
            max="10"
            class="form-control"
            value="{{ old('prova2', 0) }}"
        >
    </div>

    <div class="form-group">
        <label class="form-label">Trabalho</label>
        <input
            type="number"
            name="trabalho"
            step="0.1"
            min="0"
            max="10"
            class="form-control"
            value="{{ old('trabalho', 0) }}"
        >
    </div>

    <button type="submit" class="btn btn-primary" style="width:100%">
        Criar Nota
    </button>
</form>

@endsection

@section('scripts')
<script>
    const selectTurma = document.getElementById('select-turma');
    const selectAluno = document.getElementById('select-aluno');
    const todosAlunos = Array.from(selectAluno.options);

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

    // Dispara ao carregar se houver old('turma_id')
    if (selectTurma.value) selectTurma.dispatchEvent(new Event('change'));
</script>
@endsection