<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use Illuminate\Http\Request;
use App\Models\Curso;
class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::withCount('alunos')->paginate(15);

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
            'nome' => ['required', 'string', 'max:255'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'periodo' => ['required', 'string'],
            'ano' => ['required', 'integer'],
        ]);

        Turma::create($validated);

        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma criada com sucesso!');
    }
}