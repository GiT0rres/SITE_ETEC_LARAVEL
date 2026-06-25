<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    /**
     * Exibe a lista de cursos cadastrados.
     */
    public function index(Request $request)
    {
        /**
         * Inicia a consulta dos cursos.
         */
        $query = Curso::query();

        /**
         * Filtra os cursos pelo tipo selecionado.
         */
        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        /**
         * Ordena os cursos pelos mais recentes e aplica paginação.
         */
        $cursos = $query->latest()->paginate(6)->withQueryString();

        return view('backend.cursos.index', compact('cursos'));
    }

    /**
     * Exibe os detalhes de um curso.
     */
    public function show(Curso $curso)
    {
        return view('backend.cursos.show', compact('curso'));
    }

    /**
     * Exibe o formulário para cadastrar um novo curso.
     */
    public function create()
    {
        return view('backend.cursos.create');
    }

    /**
     * Salva um novo curso no banco de dados.
     */
    public function store(Request $request)
    {
        /**
         * Valida os dados recebidos do formulário.
         */
        $data = $this->validateData($request);

        /**
         * Salva a imagem enviada pelo usuário.
         */
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        /**
         * Cria o curso no banco de dados.
         */
        Curso::create($data);

        return redirect()
            ->route('backend.cursos.index')
            ->with('success', 'Curso criado com sucesso!');
    }

    /**
     * Exibe o formulário de edição do curso.
     */
    public function edit(Curso $curso)
    {
        return view('backend.cursos.edit', compact('curso'));
    }

    /**
     * Atualiza os dados de um curso existente.
     */
    public function update(Request $request, Curso $curso)
    {
        /**
         * Valida os dados enviados.
         */
        $data = $this->validateData($request);

        /**
         * Atualiza a imagem do curso caso uma nova seja enviada.
         */
        if ($request->hasFile('imagem')) {
            if ($curso->imagem) {
                Storage::disk('public')->delete($curso->imagem);
            }

            $data['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        /**
         * Salva as alterações do curso.
         */
        $curso->update($data);

        return redirect()
            ->route('backend.cursos.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    /**
     * Exclui um curso do sistema.
     */
    public function destroy(Curso $curso)
    {
        /**
         * Remove a imagem vinculada ao curso.
         */
        if ($curso->imagem) {
            Storage::disk('public')->delete($curso->imagem);
        }

        /**
         * Remove o curso do banco de dados.
         */
        $curso->delete();

        return redirect()
            ->route('backend.cursos.index')
            ->with('success', 'Curso excluído com sucesso!');
    }

    /**
     * Valida os dados do formulário de curso.
     */
    private function validateData(Request $request): array
    {
        $validated = $request->validate([
            'nome'      => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo'      => 'required|string|max:100',
            'duracao'   => 'nullable|string|max:100',
            'vagas'     => 'nullable|integer|min:0',
            'ativo'     => 'boolean',
            'imagem'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        /**
         * Converte o valor do checkbox para verdadeiro ou falso.
         */
        $validated['ativo'] = $request->boolean('ativo');

        return $validated;
    }
}