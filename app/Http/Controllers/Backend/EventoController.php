<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Evento;
use Illuminate\Http\Request;

/**
 * Controller responsável por controlar as funções dos eventos
 */
class EventoController extends Controller
{
    /**
     * Lista os eventos cadastrados e envia para a tela
     */
    public function index()
    {
        /** Busca os eventos ordenados pela data mais recente e mostra 6 por página */
        $eventos = Evento::orderBy('data', 'desc')->paginate(6);

        /** Retorna a tela principal dos eventos */
        return view('backend.eventos.index', compact('eventos'));
    }

    /**
     * Exibe os eventos na página de visualização
     */
    public function show()
    {
        /** Busca os eventos e aplica paginação */
        $eventos = Evento::orderBy('data', 'desc')->paginate(6);

        /** Envia os dados para a tela */
        return view('backend.eventos.show', compact('eventos'));
    }

    /**
     * Abre a tela de cadastro de evento
     */
    public function create()
    {
        return view('backend.eventos.create');
    }

    /**
     * Salva um novo evento no banco
     */
    public function store(Request $request)
    {
        /** Valida os dados preenchidos pelo usuário */
        $validated = $request->validate([
            'nome'      => ['required', 'string', 'max:255'],
            'data'      => ['required', 'date'],
            'descricao' => ['nullable', 'string'],
            'local'     => ['nullable', 'string', 'max:255'],
            'vagas'     => ['nullable', 'integer', 'min:0'],
        ]);

        /** Cria um novo evento com os dados validados */
        Evento::create($validated);

        /** Redireciona para a tela de eventos e mostra mensagem */
        return redirect()
            ->route('backend.eventos.show')
            ->with('success', 'Evento criado com sucesso!');
    }

    /**
     * Abre a tela para editar um evento existente
     */
    public function edit(Evento $evento)
    {
        /** Envia o evento selecionado para edição */
        return view('backend.eventos.edit', compact('evento'));
    }

    /**
     * Atualiza os dados do evento
     */
    public function update(Request $request, Evento $evento)
    {
        /** Valida novamente os dados antes de atualizar */
        $validated = $request->validate([
            'nome'      => ['required', 'string', 'max:255'],
            'data'      => ['required', 'date'],
            'descricao' => ['nullable', 'string'],
            'local'     => ['nullable', 'string', 'max:255'],
            'vagas'     => ['nullable', 'integer', 'min:0'],
        ]);

        /** Atualiza o evento no banco */
        $evento->update($validated);

        /** Retorna para a tela de eventos */
        return redirect()
            ->route('backend.eventos.show')
            ->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * Exclui o evento selecionado
     */
    public function destroy(Evento $evento)
    {
        /** Remove o evento do banco */
        $evento->delete();

        /** Redireciona com mensagem de confirmação */
        return redirect()
            ->route('backend.eventos.show')
            ->with('success', 'Evento excluído com sucesso!');
    }
}