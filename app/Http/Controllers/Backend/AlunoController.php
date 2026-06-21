<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Turma;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::with('turma')->paginate(15);

        return view('backend.alunos.index', compact('alunos'));
    }

    public function create()
{
    $turmas = Turma::all();

    return view('backend.alunos.create', compact('turmas'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:alunos,email'],
            'ra'       => ['required', 'string', 'unique:alunos,ra'],
            'turma_id' => ['required', 'exists:turmas,id'],
        ]);

        Aluno::create($validated);

        return redirect()->route('backend.alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }
}