@extends('layouts.backend')
@section('title', 'Eventos — ETEC Zona Leste')
@section('content')
<div class="backend-page-header">
<h1>Eventos</h1>
<div class="breadcrumb">
<a href="{{ route('backend.dashboard') }}">Dashboard</a>
<span>/</span> Eventos
</div>
</div>
@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="filtros-bar">
<a href="{{ route('backend.eventos.create') }}" class="btn-filtrar">+ Novo Evento</a>
</div>
<div class="table-card">
<div class="table-responsive">
<table>
<thead>
<tr>
<th>#</th>
<th>Nome</th>
<th>Data</th>
<th>Local</th>
<th>Vagas</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
@forelse($eventos as $i => $evento)
<tr>
<td class="td-number">{{ $eventos->firstItem() + $i }}</td>
<td class="td-name">{{ $evento->nome }}</td>
<td>{{ $evento->data->format('d/m/Y') }}</td>
<td>{{ $evento->local ?? '—' }}</td>
<td>{{ $evento->vagas ?? '—' }}</td>
<td>
<a href="{{ route('backend.eventos.edit', $evento) }}" class="btn-edit" title="Editar">✏️</a>
<form method="POST" action="{{ route('backend.eventos.destroy', $evento) }}"
onsubmit="return confirm('Tem certeza que deseja excluir este evento?')"
style="display:inline;">
@csrf
@method('DELETE')
<button type="submit" class="btn-edit" title="Excluir">🗑️</button>
</form>
</td>
</tr>
@empty
<tr>
<td colspan="6" style="color:var(--gray-400);text-align:center;padding:2rem;">
Nenhum evento cadastrado.
</td>
</tr>
@endforelse
</tbody>
</table>
</div>
{{ $eventos->links() }}
</div>
@endsection