<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Requests\FormularioRequest;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Mostra a tela do formulário para o usuário.
     */
    public function index()
    {
        return view('formulario.index');
    }

    /**
     * Salva as informações preenchidas no formulário.
     */
    public function store(FormularioRequest $request)
    {
        /**
         * Cria um novo registro com os dados informados.
         */
        Contato::create($request->validated());

        /**
         * Volta para a página e mostra uma mensagem de confirmação.
         */
        return redirect()
            ->route('formulario.index')
            ->with('success', 'Mensagem enviada com sucesso! Entraremos em contato em breve.');
    }
}