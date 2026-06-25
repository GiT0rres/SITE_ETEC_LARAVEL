<x-guest-layout>

    /** Formulário para redefinir senha */
    <form method="POST" action="{{ route('password.store') }}">

        /** Proteção contra ataques CSRF */
        @csrf

        /** Campo oculto que guarda o token de recuperação */
        <input
            type="hidden"
            name="token"
            value="{{ $request->route('token') }}"
        >

        /** Campo de e-mail */
        <div>

            /** Rótulo do e-mail */
            <x-input-label
                for="email"
                :value="__('Email')"
            />

            /** Campo para digitar e-mail */
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
                autocomplete="username"
            />

            /** Exibe erros de validação */
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

        /** Campo da nova senha */
        <div class="mt-4">

            /** Rótulo da senha */
            <x-input-label
                for="password"
                :value="__('Password')"
            />

            /** Campo para digitar nova senha */
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            /** Exibe erros da senha */
            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />

        </div>

        /** Campo para confirmar senha */
        <div class="mt-4">

            /** Rótulo da confirmação */
            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')"
            />

            /** Campo para confirmar senha */
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            /** Exibe erros da confirmação */
            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2"
            />

        </div>

        /** Área do botão */
        <div class="flex items-center justify-end mt-4">

            /** Botão para redefinir senha */
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>