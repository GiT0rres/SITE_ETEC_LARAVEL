<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Exibe a tela para solicitar redefinição de senha.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Processa a solicitação do link para redefinir senha.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /** Valida se o e-mail foi preenchido corretamente */
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        /**
         * Envia o link de redefinição para o e-mail informado.
         * Depois verifica se o envio deu certo.
         */
        $status = Password::sendResetLink(
            $request->only('email')
        );

        /**
         * Se o envio funcionar retorna mensagem de sucesso,
         * senão volta para a tela mantendo o e-mail e exibindo erro
         */
        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()
                        ->withInput($request->only('email'))
                        ->withErrors([
                            'email' => __($status)
                        ]);
    }
}