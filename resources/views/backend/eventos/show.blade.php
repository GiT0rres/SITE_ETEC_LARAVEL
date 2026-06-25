@extends('layouts.backend')

/** Define o título da página */
@section('title', 'Eventos — ETEC Zona Leste')

@section('content')

/** Cabeçalho da página */

<div class="backend-page-header">

<h1>Eventos</h1>

```
/** Navegação da página */
```

<div class="breadcrumb">

<a href="{{ route('backend.dashboard') }}">
Dashboard
</a>

<span>/</span>

Eventos

</div>

</div>

/** Exibe mensagem de sucesso */
@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

/** Área de ações */

<div class="filtros-bar">

```
/** Botão para criar evento */
```

<a
href="{{ route('backend.eventos.create') }}"
class="btn-filtrar"

>

* Novo Evento

  </a>

</div>

/** Card com tabela */

<div class="table-card">

<div class="table-responsive">

<table>

```
/** Cabeçalho */
```

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

/** Corpo da tabela */

<tbody>

```
/** Percorre lista de eventos */
```

@forelse($eventos as $i => $evento)

<tr>

```
/** Número da linha */
```

<td class="td-number">

{{ $eventos->firstItem() + $i }}

</td>

/** Nome */

<td class="td-name">

{{ $evento->nome }}

</td>

/** Data formatada */

<td>

{{ $evento->data->format('d/m/Y') }}

</td>

/** Local */

<td>

{{ $evento->local ?? '—' }}

</td>

/** Quantidade de vagas */

<td>

{{ $evento->vagas ?? '—' }}

</td>

/** Botões */

<td>

```
/** Editar */
```

<a
href="{{ route('backend.eventos.edit', $evento) }}"
class="btn-edit"
title="Editar"

>

✏️ </a>

/** Excluir */

<form
method="POST"
action="{{ route('backend.eventos.destroy', $evento) }}"
onsubmit="return confirm('Tem certeza que deseja excluir este evento?')"
style="display:inline;"
>

@csrf

@method('DELETE')

<button
type="submit"
class="btn-edit"
title="Excluir"

>

🗑️ </button>

</form>

</td>

</tr>

/** Caso não tenha registros */
@empty

<tr>

<td
colspan="6"
style="color:var(--gray-400);text-align:center;padding:2rem;"
>

Nenhum evento cadastrado.

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

/** Paginação */
{{ $eventos->links() }}

</div>

@endsection
