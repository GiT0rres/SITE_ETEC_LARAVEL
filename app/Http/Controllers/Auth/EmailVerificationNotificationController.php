<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Envia um novo e-mail de verificação.
     */
    public function store(Request $request): RedirectResponse
    {
        /** Verifica se o usuário já confirmou o e-mail */
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        /** Envia o e-mail para verificação */
        $request->user()->sendEmailVerificationNotification();

        /** Retorna para a página anterior com mensagem de sucesso */
        return back()->with('status', 'verification-link-sent');
    }
}