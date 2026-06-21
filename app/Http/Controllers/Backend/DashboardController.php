<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Nota;
use App\Models\Turma;

class DashboardController extends Controller
{
    public function index()
    {
        $totalAlunos = Aluno::count();
        $totalTurmas = Turma::count();
        $totalCursos = Curso::count();
        $mediaGeral  = Nota::avg('media') ?? 0;
        $ultimasNotas = Nota::with(['aluno', 'turma'])->latest()->take(10)->get();

        return view('backend.dashboard', compact(
            'totalAlunos',
            'totalTurmas',
            'totalCursos',
            'mediaGeral',
            'ultimasNotas'
        ));
    }
}