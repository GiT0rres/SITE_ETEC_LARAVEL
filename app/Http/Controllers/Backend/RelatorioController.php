<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\Turma;

/**
 * Controller responsável pela geração dos relatórios
 */
class RelatorioController extends Controller
{
    /**
     * Busca os dados necessários para montar os relatórios
     */
    public function index()
    {
        /** Busca todas as turmas cadastradas */
        $turmas = Turma::all();

        /**
         * Calcula a média das notas de cada turma
         * e relaciona com os dados da própria turma
         */
        $mediasPorTurma = Nota::with('turma')
            ->selectRaw('turma_id, AVG(media) as media_turma')
            ->groupBy('turma_id')
            ->get();

        /** Envia os dados para aparecer na tela de relatório */
        return view(
            'backend.relatorios.index',
            compact('turmas', 'mediasPorTurma')
        );
    }
}