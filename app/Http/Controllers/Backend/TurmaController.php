<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::with('curso')->withCount('alunos')->paginate(15);
        return view('backend.turmas.index', compact('turmas'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('backend.turmas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'periodo'  => ['required', 'string'],
            'ano'      => ['required', 'integer'],
            'imagem'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('imagem')) {
            $validated['imagem'] = $request->file('imagem')->store('turmas', 'public');
        }

        Turma::create($validated);

        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma criada com sucesso!');
    }

    public function edit(Turma $turma)
    {
        $cursos = Curso::all();
        return view('backend.turmas.edit', compact('turma', 'cursos'));
    }

    public function update(Request $request, Turma $turma)
    {
        $validated = $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'periodo'  => ['required', 'string'],
            'ano'      => ['required', 'integer'],
            'imagem'   => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('imagem')) {
            if ($turma->imagem) {
                Storage::disk('public')->delete($turma->imagem);
            }
            $validated['imagem'] = $request->file('imagem')->store('turmas', 'public');
        }

        $turma->update($validated);

        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma atualizada com sucesso!');
    }

    public function destroy(Turma $turma)
    {
        if ($turma->imagem) {
            Storage::disk('public')->delete($turma->imagem);
        }

        $turma->delete();

        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma excluída com sucesso!');
    }
}