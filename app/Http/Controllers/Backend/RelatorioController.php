<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Nota;
use App\Models\Turma;

class RelatorioController extends Controller
{
    public function index()
    {
        $turmas          = Turma::all();
        $mediasPorTurma  = Nota::with('turma')
            ->selectRaw('turma_id, AVG(media) as media_turma')
            ->groupBy('turma_id')
            ->get();

        return view('backend.relatorios.index', compact('turmas', 'mediasPorTurma'));
    }
}