<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * Exibe a tela de verificação de e-mail.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        /** 
         * Se o usuário já verificou o e-mail, redireciona para o dashboard.
         * Caso contrário, abre a tela para confirmação.
         */
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : view('auth.verify-email');
    }
}