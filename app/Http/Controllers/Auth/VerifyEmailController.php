<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Marca o e-mail do usuário autenticado como verificado.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        /** Verifica se o e-mail já foi confirmado */
        if ($request->user()->hasVerifiedEmail()) {

            /** Redireciona para o dashboard */
            return redirect()->intended(
                route('dashboard', absolute: false) . '?verified=1'
            );
        }

        /** Marca o e-mail como verificado */
        if ($request->user()->markEmailAsVerified()) {

            /** Dispara o evento de verificação */
            event(new Verified($request->user()));
        }

        /** Retorna para o dashboard após concluir */
        return redirect()->intended(
            route('dashboard', absolute: false) . '?verified=1'
        );
    }
}