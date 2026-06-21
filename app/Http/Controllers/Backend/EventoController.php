<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::orderBy('data', 'desc')->paginate(6);

        return view('backend.eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('backend.eventos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'data' => ['required', 'date'],
            'descricao' => ['nullable', 'string'],
        ]);

        Evento::create($validated);

        return redirect()
            ->route('backend.eventos.index')
            ->with('success', 'Evento criado com sucesso!');
    }
}