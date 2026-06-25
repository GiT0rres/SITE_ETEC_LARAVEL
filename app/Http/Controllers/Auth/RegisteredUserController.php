<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Exibe a tela de cadastro.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Processa a solicitação de cadastro do usuário.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        /** Valida os dados preenchidos no formulário */
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class
            ],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
        ]);

        /** Cria o novo usuário no banco */
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,

            /** Salva a senha criptografada */
            'password' => Hash::make($request->password),
        ]);

        /** Dispara o evento de registro */
        event(new Registered($user));

        /** Faz login automaticamente após o cadastro */
        Auth::login($user);

        /** Redireciona para o dashboard */
        return redirect(
            route('backend.dashboard', absolute: false)
        );
    }
}