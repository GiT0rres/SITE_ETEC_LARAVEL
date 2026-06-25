<!-- Barra superior do painel administrativo -->
<div class="backend-topbar">

    <!-- Logo e identificação da instituição -->
    <a href="{{ route('home') }}" class="brand">
        
        <!-- Ícone/logo da ETEC -->
        <div class="navbar-logo">E</div>

        <!-- Nome da instituição -->
        <div class="brand-name">
            ETEC
            <small>Zona Leste</small>
        </div>
    </a>

    <!-- Área de informações do usuário -->
    <div class="topbar-user">

        <!-- Exibe informações apenas se o usuário estiver autenticado -->
        @auth

            <!-- Saudação com o nome do usuário logado -->
            <span>Olá, {{ Auth::user()->name }}</span>

            <!-- Avatar gerado com a primeira letra do nome -->
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>

        @endauth

        <!-- Formulário para realizar logout -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <!-- Botão para encerrar a sessão -->
            <button type="submit" class="btn btn-outline btn-sm">
                Sair
            </button>
        </form>

    </div>

</div>