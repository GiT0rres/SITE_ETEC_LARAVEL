<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(Request $request)
    {
        $query = Curso::query();

        if ($request->filled('tipo')) {
            $query->where('tipo', $request->tipo);
        }

        $cursos = $query->latest()->paginate(6)->withQueryString();

        return view('cursos.index', compact('cursos'));
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }
}