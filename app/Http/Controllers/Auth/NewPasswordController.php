<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class NewPasswordController extends Controller
{
    /**
     * Exibe a tela para redefinir a senha.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Processa a solicitação de redefinição de senha.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /** Valida os dados enviados pelo usuário */
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        /**
         * Tenta redefinir a senha do usuário.
         * Se funcionar, atualiza no banco de dados.
         * Caso contrário, retorna erro.
         */
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user) use ($request) {

                /** Atualiza a senha criptografada */
                $user->forceFill([
                    'password' => Hash::make($request->password),

                    /** Gera um novo token de sessão */
                    'remember_token' => Str::random(60),
                ])->save();

                /** Dispara o evento de redefinição */
                event(new PasswordReset($user));
            }
        );

        /**
         * Se redefiniu com sucesso, envia para login.
         * Caso contrário, retorna para a tela com erro.
         */
        return $status == Password::PASSWORD_RESET
                    ? redirect()
                        ->route('login')
                        ->with('status', __($status))
                    : back()
                        ->withInput($request->only('email'))
                        ->withErrors([
                            'email' => __($status)
                        ]);
    }
}