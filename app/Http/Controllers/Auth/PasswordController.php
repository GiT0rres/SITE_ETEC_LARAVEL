<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Atualiza a senha do usuário.
     */
    public function update(Request $request): RedirectResponse
    {
        /** 
         * Valida a senha atual e verifica se a nova senha
         * atende aos requisitos definidos
         */
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        /** Salva a nova senha criptografada */
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        /** Retorna para a página anterior com mensagem de sucesso */
        return back()->with('status', 'password-updated');
    }
}