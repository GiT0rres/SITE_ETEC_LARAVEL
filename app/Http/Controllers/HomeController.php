<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Controla o que será exibido na tela inicial do sistema.
     */
    public function index()
    {
        /**
         * Pega apenas os 3 cursos mais novos para mostrar como destaque.
         */
        $destaques = Curso::latest()->take(3)->get();

        /**
         * Retorna a página home e envia os destaques para ela.
         */
        return view('home.index', compact('destaques'));
    }
}