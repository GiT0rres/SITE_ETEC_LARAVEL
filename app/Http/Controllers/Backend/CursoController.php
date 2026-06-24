<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        $cursos = $query->latest()->paginate(6)->withQueryString();

        return view('backend.cursos.index', compact('cursos'));
    }

   public function show(Curso $curso)
{
    return view('backend.cursos.show', compact('curso'));
}

    public function create()
    {
        return view('backend.cursos.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        Curso::create($data);

        return redirect()
            ->route('backend.cursos.index')
            ->with('success', 'Curso criado com sucesso!');
    }

    public function edit(Curso $curso)
    {
        return view('backend.cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $data = $this->validateData($request);

        if ($request->hasFile('imagem')) {
            if ($curso->imagem) {
                Storage::disk('public')->delete($curso->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('cursos', 'public');
        }

        $curso->update($data);

        return redirect()
            ->route('backend.cursos.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->imagem) {
            Storage::disk('public')->delete($curso->imagem);
        }

        $curso->delete();

        return redirect()
            ->route('backend.cursos.index')
            ->with('success', 'Curso excluído com sucesso!');
    }

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

        $validated['ativo'] = $request->boolean('ativo');

        return $validated;
    }
}