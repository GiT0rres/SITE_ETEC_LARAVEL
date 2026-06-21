<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Http\Requests\FormularioRequest;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function index()
    {
        return view('formulario.index');
    }

    public function store(FormularioRequest $request)
    {
        Contato::create($request->validated());

        return redirect()
            ->route('formulario.index')
            ->with('success', 'Mensagem enviada com sucesso! Entraremos em contato em breve.');
    }
}