<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    {{-- NAVBAR --}}
    @include('components.navbar')

    <main class="auth-wrapper">
        {{ $slot }}
    </main>

    {{-- FOOTER --}}
    @include('components.footer')

</body>
</html>