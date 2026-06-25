<x-guest-layout>

    /** Mensagem explicando a necessidade de verificar o e-mail */
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    /** Exibe mensagem caso um novo e-mail tenha sido enviado */
    @if (session('status') == 'verification-link-sent')

        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>

    @endif

    /** Área dos botões */
    <div class="mt-4 flex items-center justify-between">

        /** Formulário para reenviar e-mail de verificação */
        <form method="POST" action="{{ route('verification.send') }}">

            /** Proteção contra ataques CSRF */
            @csrf

            <div>

                /** Botão para reenviar e-mail */
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>

            </div>

        </form>

        /** Formulário para sair da conta */
        <form method="POST" action="{{ route('logout') }}">

            /** Proteção contra ataques CSRF */
            @csrf

            /** Botão de logout */
            <button
                type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            >
                {{ __('Log Out') }}
            </button>

        </form>

    </div>

</x-guest-layout>