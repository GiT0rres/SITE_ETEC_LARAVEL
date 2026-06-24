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
        return view('backend.eventos.index', compact('eventos')); // ← view PÚBLICA
    }

    public function show()
    {
        $eventos = Evento::orderBy('data', 'desc')->paginate(6);
        return view('backend.eventos.show', compact('eventos'));
    }

    public function create()
    {
        return view('backend.eventos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'      => ['required', 'string', 'max:255'],
            'data'      => ['required', 'date'],
            'descricao' => ['nullable', 'string'],
            'local'     => ['nullable', 'string', 'max:255'],
            'vagas'     => ['nullable', 'integer', 'min:0'],
        ]);

        Evento::create($validated);

        return redirect()
            ->route('backend.eventos.show')
            ->with('success', 'Evento criado com sucesso!');
    }

    public function edit(Evento $evento)
    {
        return view('backend.eventos.edit', compact('evento'));
    }

    public function update(Request $request, Evento $evento)
    {
        $validated = $request->validate([
            'nome'      => ['required', 'string', 'max:255'],
            'data'      => ['required', 'date'],
            'descricao' => ['nullable', 'string'],
            'local'     => ['nullable', 'string', 'max:255'],
            'vagas'     => ['nullable', 'integer', 'min:0'],
        ]);

        $evento->update($validated);

        return redirect()
            ->route('backend.eventos.show')
            ->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Evento $evento)
    {
        $evento->delete();

        return redirect()
            ->route('backend.eventos.show')
            ->with('success', 'Evento excluído com sucesso!');
    }
}