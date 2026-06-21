<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Painel — ETEC Zona Leste')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/backend.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body class="backend-body">

@include('components.backend-topbar')

<div class="backend-wrapper">
    @include('components.backend-sidebar')
    <main class="backend-main">
        <div class="backend-content">
            @yield('content')
        </div>
    </main>
</div>

@yield('scripts')
</body>
</html>