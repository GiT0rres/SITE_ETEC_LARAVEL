<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Controller responsável pelo gerenciamento das turmas
 */
class TurmaController extends Controller
{
    /**
     * Mostra todas as turmas cadastradas
     */
    public function index()
    {
        /** Busca as turmas junto com o curso e quantidade de alunos */
        $turmas = Turma::with('curso')
            ->withCount('alunos')
            ->paginate(15);

        /** Envia os dados para a tela */
        return view('backend.turmas.index', compact('turmas'));
    }

    /**
     * Abre a tela para criar uma nova turma
     */
    public function create()
    {
        /** Busca todos os cursos cadastrados */
        $cursos = Curso::all();

        /** Envia os cursos para aparecer no formulário */
        return view('backend.turmas.create', compact('cursos'));
    }

    /**
     * Salva uma nova turma no banco
     */
    public function store(Request $request)
    {
        /** Valida os dados recebidos do formulário */
        $validated = $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'periodo'  => ['required', 'string'],
            'ano'      => ['required', 'integer'],
            'imagem'   => ['nullable', 'image', 'max:2048'],
        ]);

        /** Verifica se foi enviada uma imagem */
        if ($request->hasFile('imagem')) {

            /** Salva a imagem na pasta turmas */
            $validated['imagem'] = $request
                ->file('imagem')
                ->store('turmas', 'public');
        }

        /** Cria a turma com os dados validados */
        Turma::create($validated);

        /** Retorna para a listagem */
        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma criada com sucesso!');
    }

    /**
     * Abre a tela para editar uma turma
     */
    public function edit(Turma $turma)
    {
        /** Busca todos os cursos */
        $cursos = Curso::all();

        /** Envia turma e cursos para a tela */
        return view(
            'backend.turmas.edit',
            compact('turma', 'cursos')
        );
    }

    /**
     * Atualiza os dados da turma
     */
    public function update(Request $request, Turma $turma)
    {
        /** Valida os novos dados */
        $validated = $request->validate([
            'nome'     => ['required', 'string', 'max:255'],
            'curso_id' => ['required', 'exists:cursos,id'],
            'periodo'  => ['required', 'string'],
            'ano'      => ['required', 'integer'],
            'imagem'   => ['nullable', 'image', 'max:2048'],
        ]);

        /** Verifica se foi enviada uma nova imagem */
        if ($request->hasFile('imagem')) {

            /** Remove a imagem antiga */
            if ($turma->imagem) {
                Storage::disk('public')->delete($turma->imagem);
            }

            /** Salva a nova imagem */
            $validated['imagem'] = $request
                ->file('imagem')
                ->store('turmas', 'public');
        }

        /** Atualiza os dados da turma */
        $turma->update($validated);

        /** Volta para a listagem */
        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma atualizada com sucesso!');
    }

    /**
     * Exclui uma turma
     */
    public function destroy(Turma $turma)
    {
        /** Remove a imagem salva caso exista */
        if ($turma->imagem) {
            Storage::disk('public')->delete($turma->imagem);
        }

        /** Remove a turma do banco */
        $turma->delete();

        /** Retorna para a tela principal */
        return redirect()
            ->route('backend.turmas.index')
            ->with('success', 'Turma excluída com sucesso!');
    }
}