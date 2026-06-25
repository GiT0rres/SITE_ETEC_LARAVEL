<x-guest-layout>

    /** Mensagem informando que é uma área protegida */
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    /** Formulário para confirmar senha */
    <form method="POST" action="{{ route('password.confirm') }}">

        /** Proteção contra ataques CSRF */
        @csrf

        /** Campo de senha */
        <div>

            /** Exibe o rótulo do campo */
            <x-input-label for="password" :value="__('Password')" />

            /** Campo para digitar a senha */
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />

            /** Mostra mensagens de erro caso existam */
            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2"
            />
        </div>

        /** Área do botão */
        <div class="flex justify-end mt-4">

            /** Botão para confirmar */
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>

        </div>
    </form>

</x-guest-layout>