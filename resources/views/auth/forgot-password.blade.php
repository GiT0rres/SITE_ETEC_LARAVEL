<x-guest-layout>

    /** Mensagem explicando a recuperação de senha */
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    /** Exibe mensagens de status da sessão */
    <x-auth-session-status
        class="mb-4"
        :status="session('status')"
    />

    /** Formulário para solicitar redefinição de senha */
    <form method="POST" action="{{ route('password.email') }}">

        /** Proteção contra ataques CSRF */
        @csrf

        /** Campo de e-mail */
        <div>

            /** Exibe o rótulo do campo */
            <x-input-label
                for="email"
                :value="__('Email')"
            />

            /** Campo para digitar o e-mail */
            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
            />

            /** Mostra erros de validação do e-mail */
            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2"
            />

        </div>

        /** Área do botão de envio */
        <div class="flex items-center justify-end mt-4">

            /** Botão para enviar o link de redefinição */
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>

        </div>

    </form>

</x-guest-layout>