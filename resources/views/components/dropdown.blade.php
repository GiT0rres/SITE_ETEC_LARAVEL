<!-- Define propriedades do componente com valores padrão -->
@props([
    'align' => 'right',          <!-- Alinhamento do dropdown -->
    'width' => '48',            <!-- Largura do dropdown -->
    'contentClasses' => 'py-1 bg-white' <!-- Classes do conteúdo interno -->
])

<!-- Configura classes dinamicamente conforme as propriedades recebidas -->
@php

    // Define as classes de alinhamento do menu suspenso
    $alignmentClasses = match ($align) {
        'left' => 'ltr:origin-top-left rtl:origin-top-right start-0',
        'top' => 'origin-top',
        default => 'ltr:origin-top-right rtl:origin-top-left end-0',
    };

    // Define a largura do dropdown
    $width = match ($width) {
        '48' => 'w-48',
        default => $width,
    };

@endphp

<!-- Container principal do dropdown -->
<div
    class="relative"
    x-data="{ open: false }"
    @click.outside="open = false"
    @close.stop="open = false"
>

    <!-- Área que dispara a abertura e fechamento do dropdown -->
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <!-- Menu suspenso -->
    <div
        x-show="open"

        <!-- Animação de entrada -->
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"

        <!-- Animação de saída -->
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"

        <!-- Posicionamento e aparência do dropdown -->
        class="absolute z-50 mt-2 {{ $width }} rounded-md shadow-lg {{ $alignmentClasses }}"

        <!-- Mantém oculto até o Alpine.js ativar -->
        style="display: none;"

        <!-- Fecha o dropdown ao clicar em uma opção -->
        @click="open = false"
    >

        <!-- Conteúdo interno do dropdown -->
        <div class="rounded-md ring-1 ring-black ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>

    </div>

</div>