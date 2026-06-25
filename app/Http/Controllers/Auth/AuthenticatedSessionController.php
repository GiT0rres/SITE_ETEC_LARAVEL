<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Controller responsável pelo login e logout do usuário
 */
class AuthenticatedSessionController extends Controller
{
    /**
     * Abre a tela de login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Realiza a autenticação do usuário
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        /** Verifica se os dados de login estão corretos */
        $request->authenticate();

        /** Gera uma nova sessão por segurança */
        $request->session()->regenerate();

        /** Redireciona para o dashboard após entrar */
        return redirect()->route('backend.dashboard');
    }

    /**
     * Faz o logout do sistema
     */
    public function destroy(Request $request): RedirectResponse
    {
        /** Encerra a autenticação do usuário */
        Auth::guard('web')->logout();

        /** Invalida a sessão atual */
        $request->session()->invalidate();

        /** Gera um novo token de segurança */
        $request->session()->regenerateToken();

        /** Retorna para a página inicial */
        return redirect('/');
    }
}