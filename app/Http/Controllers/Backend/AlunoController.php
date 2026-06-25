<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Turma;

class AlunoController extends Controller
{
    /**
     * Lista todos os alunos cadastrados no sistema.
     */
    public function index()
    {
        /**
         * Busca os alunos junto com suas turmas
         * e divide os resultados em páginas.
         */
        $alunos = Aluno::with('turma')->paginate(15);

        return view('backend.alunos.index', compact('alunos'));
    }

    /**
     * Exibe o formulário para cadastrar um novo aluno.
     */
    public function create()
    {
        /**
         * Busca todas as turmas para preencher o select.
         */
        $turmas = Turma::all();

        return view('backend.alunos.create', compact('turmas'));
    }

    /**
     * Salva um novo aluno no banco de dados.
     */
    public function store(Request $request)
    {
        /**
         * Valida os dados informados pelo usuário.
         */
        $validated = $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'unique:alunos,email'],
            'ra'       => ['required', 'string', 'unique:alunos,ra'],
            'turma_id' => ['required', 'exists:turmas,id'],
        ]);

        /**
         * Cria um novo registro de aluno.
         */
        Aluno::create($validated);

        /**
         * Retorna para a listagem com mensagem de sucesso.
         */
        return redirect()->route('backend.alunos.index')
            ->with('success', 'Aluno cadastrado com sucesso!');
    }
}