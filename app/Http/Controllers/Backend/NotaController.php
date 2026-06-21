<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\Turma;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index(Request $request)
    {
        $turmas      = Turma::all();
        $disciplinas = Nota::distinct()->pluck('disciplina')->sort()->values();

        $query = Nota::with(['aluno', 'turma']);

        if ($request->filled('turma_id')) {
            $query->where('turma_id', $request->turma_id);
        }

        if ($request->filled('disciplina')) {
            $query->where('disciplina', $request->disciplina);
        }

        if ($request->filled('periodo')) {
            $query->where('periodo', $request->periodo);
        }

        $notas = $query->paginate(10)->withQueryString();

        return view('backend.notas.index', compact('notas', 'turmas', 'disciplinas'));
    }

    public function edit(Nota $nota)
    {
        return view('backend.notas.edit', compact('nota'));
    }

    public function update(Request $request, Nota $nota)
    {
        $validated = $request->validate([
            'prova1'   => ['required', 'numeric', 'min:0', 'max:10'],
            'prova2'   => ['required', 'numeric', 'min:0', 'max:10'],
            'trabalho' => ['required', 'numeric', 'min:0', 'max:10'],
        ]);

        $validated['media'] = round(
            ($validated['prova1'] + $validated['prova2'] + $validated['trabalho']) / 3,
            1
        );

        $nota->update($validated);

        return redirect()
            ->route('backend.notas.index')
            ->with('success', 'Nota atualizada com sucesso!');
    }
}