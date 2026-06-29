@extends('layouts.backend')

{{-- Define o título da página --}}
@section('title', 'Alunos — ETEC Zona Leste')

@section('content')

{{-- Cabeçalho da página --}}
<div class="backend-page-header">
    {{-- Título --}}
    <h1>Alunos</h1>
    {{-- Caminho de navegação --}}
    <div class="breadcrumb">
        {{-- Link para dashboard --}}
        <a href="{{ route('backend.dashboard') }}">Dashboard</a>
        <span>/</span> Alunos
    </div>
</div>

{{-- Exibe mensagem de sucesso --}}
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Área do botão de cadastro --}}
<div style="display:flex;justify-content:flex-end;margin-bottom:1rem;">
    {{-- Botão para criar aluno --}}
    <a href="{{ route('backend.alunos.create') }}" class="btn btn-primary btn-sm">+ Novo Aluno</a>
</div>

{{-- Card da tabela --}}
<div class="table-card">
    <div class="table-responsive">
        <table>
            {{-- Cabeçalho da tabela --}}
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>RA</th>
                    <th>E-mail</th>
                    <th>Turma</th>
                </tr>
            </thead>
            {{-- Corpo da tabela --}}
            <tbody>
                {{-- Percorre lista de alunos --}}
                @forelse($alunos as $i => $aluno)
                <tr>
                    {{-- Número da linha --}}
                    <td class="td-number">{{ $alunos->firstItem() + $i }}</td>
                    {{-- Nome do aluno --}}
                    <td class="td-name">{{ $aluno->nome }}</td>
                    {{-- RA --}}
                    <td>{{ $aluno->ra }}</td>
                    {{-- E-mail --}}
                    <td>{{ $aluno->email }}</td>
                    {{-- Nome da turma --}}
                    <td>{{ $aluno->turma->nome ?? '—' }}</td>
                </tr>
                {{-- Caso não exista aluno --}}
                @empty
                <tr>
                    <td colspan="5" style="color:var(--gray-400);text-align:center;padding:2rem;">
                        Nenhum aluno cadastrado.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Exibe paginação --}}
@if($alunos->hasPages())
<div class="pagination">
    {{-- Botão página anterior --}}
    @if($alunos->onFirstPage())
        <span>&#8249;</span>
    @else
        <a href="{{ $alunos->previousPageUrl() }}">&#8249;</a>
    @endif

    {{-- Lista páginas --}}
    @foreach($alunos->getUrlRange(1, $alunos->lastPage()) as $page => $url)
        @if($page == $alunos->currentPage())
            <span class="page-current">{{ $page }}</span>
        @else
            <a href="{{ $url }}">{{ $page }}</a>
        @endif
    @endforeach

    {{-- Botão próxima página --}}
    @if($alunos->hasMorePages())
        <a href="{{ $alunos->nextPageUrl() }}">&#8250;</a>
    @else
        <span>&#8250;</span>
    @endif
</div>
@endif

@endsection