<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\Turma;
use Illuminate\Http\Request;

/**
 * Controller responsável por gerenciar as notas dos alunos
 */
class NotaController extends Controller
{
    /**
     * Lista as notas e permite aplicar filtros
     */
    public function index(Request $request)
    {
        /** Busca todas as turmas cadastradas */
        $turmas = Turma::all();

        /** Busca disciplinas sem repetir valores */
        $disciplinas = Nota::distinct()->pluck('disciplina')->sort()->values();

        /** Inicia consulta carregando aluno e turma */
        $query = Nota::with(['aluno', 'turma']);

        /** Filtra pela turma selecionada */
        if ($request->filled('turma_id')) {
            $query->where('turma_id', $request->turma_id);
        }

        /** Filtra pela disciplina */
        if ($request->filled('disciplina')) {
            $query->where('disciplina', $request->disciplina);
        }

        /** Filtra pelo período */
        if ($request->filled('periodo')) {
            $query->where('periodo', $request->periodo);
        }

        /** Mostra 10 registros por página e mantém os filtros */
        $notas = $query->paginate(10)->withQueryString();

        /** Envia os dados para a tela */
        return view('backend.notas.index', compact(
            'notas',
            'turmas',
            'disciplinas'
        ));
    }

    /**
     * Abre a tela de edição da nota
     */
    public function edit(Nota $nota)
    {
        return view('backend.notas.edit', compact('nota'));
    }

    /**
     * Atualiza uma nota existente
     */
    public function update(Request $request, Nota $nota)
    {
        /** Valida as notas digitadas */
        $validated = $request->validate([
            'prova1'   => ['required', 'numeric', 'min:0', 'max:10'],
            'prova2'   => ['required', 'numeric', 'min:0', 'max:10'],
            'trabalho' => ['required', 'numeric', 'min:0', 'max:10'],
        ]);

        /** Calcula automaticamente a média final */
        $validated['media'] = round(
            ($validated['prova1'] +
             $validated['prova2'] +
             $validated['trabalho']) / 3,
            1
        );

        /** Atualiza os dados da nota */
        $nota->update($validated);

        /** Retorna para a listagem */
        return redirect()
            ->route('backend.notas.index')
            ->with('success', 'Nota atualizada com sucesso!');
    }

    /**
     * Abre a tela para cadastrar uma nota
     */
    public function create()
    {
        /** Busca turmas e alunos cadastrados */
        $turmas = Turma::all();
        $alunos = \App\Models\Aluno::all();

        /** Envia os dados para a tela */
        return view('backend.notas.create', compact('turmas', 'alunos'));
    }

    /**
     * Salva uma nova nota
     */
    public function store(Request $request)
    {
        /** Valida os dados enviados */
        $validated = $request->validate([
            'aluno_id'   => ['required', 'exists:alunos,id'],
            'turma_id'   => ['required', 'exists:turmas,id'],
            'disciplina' => ['required', 'string', 'max:100'],
            'periodo'    => ['required', 'in:1,2,3,4'],
            'prova1'     => ['required', 'numeric', 'min:0', 'max:10'],
            'prova2'     => ['required', 'numeric', 'min:0', 'max:10'],
            'trabalho'   => ['required', 'numeric', 'min:0', 'max:10'],
        ]);

        /** Cria a nota no banco */
        Nota::create($validated);

        /** Retorna para a página principal */
        return redirect()
            ->route('backend.notas.index')
            ->with('success', 'Nota criada com sucesso!');
    }

    /**
     * Exclui uma nota cadastrada
     */
    public function destroy(Nota $nota)
    {
        /** Remove a nota do banco */
        $nota->delete();

        /** Retorna com mensagem de sucesso */
        return redirect()
            ->route('backend.notas.index')
            ->with('success', 'Nota excluída com sucesso!');
    }
}