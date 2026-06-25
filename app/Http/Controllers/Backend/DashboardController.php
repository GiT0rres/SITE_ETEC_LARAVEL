<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Nota;
use App\Models\Turma;

/**
 * Controller responsável por carregar as informações do dashboard
 */
class DashboardController extends Controller
{
    /**
     * Método que busca os dados para exibir na tela inicial do sistema
     */
    public function index()
    {
        /** Conta quantos alunos estão cadastrados */
        $totalAlunos = Aluno::count();

        /** Conta a quantidade de turmas */
        $totalTurmas = Turma::count();

        /** Conta quantos cursos existem */
        $totalCursos = Curso::count();

        /** Calcula a média geral das notas e coloca 0 caso não tenha nota */
        $mediaGeral  = Nota::avg('media') ?? 0;

        /** Busca as 10 últimas notas junto com os dados do aluno e da turma */
        $ultimasNotas = Nota::with(['aluno', 'turma'])->latest()->take(10)->get();

        /**
         * Envia todas as informações para aparecer na tela do dashboard
         */
        return view('backend.dashboard', compact(
            'totalAlunos',
            'totalTurmas',
            'totalCursos',
            'mediaGeral',
            'ultimasNotas'
        ));
    }
}