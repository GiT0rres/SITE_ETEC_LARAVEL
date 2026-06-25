<!-- Define a propriedade recebida pelo componente -->
@props(['messages'])

<!-- Verifica se existem mensagens de erro -->
@if ($messages)

    <!-- Lista que exibe as mensagens de validação -->
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>

        <!-- Percorre todas as mensagens recebidas -->
        @foreach ((array) $messages as $message)

            <!-- Exibe uma mensagem de erro -->
            <li>{{ $message }}</li>

        @endforeach

    </ul>

@endif