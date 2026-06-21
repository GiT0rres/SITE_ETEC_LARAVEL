<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destaques = Curso::latest()->take(3)->get();

        return view('home.index', compact('destaques'));
    }
}