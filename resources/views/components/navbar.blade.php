<nav class="navbar">
    <a href="{{ route('home') }}" class="navbar-brand">
        <div class="navbar-logo">E</div>
        <div class="navbar-brand-name">
            ETEC
            <small>Zona Leste</small>
        </div>
    </a>
    <ul class="navbar-links">
        <li><a href="{{ route('home') }}"             class="{{ request()->routeIs('home')        ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('cursos.index') }}"     class="{{ request()->routeIs('cursos.*')    ? 'active' : '' }}">Cursos</a></li>
        <li><a href="{{ route('eventos.index') }}"    class="{{ request()->routeIs('eventos.*')   ? 'active' : '' }}">Eventos</a></li>
        <li><a href="{{ route('formulario.index') }}" class="{{ request()->routeIs('formulario.*')? 'active' : '' }}">Formulário</a></li>
        @auth
            <li><a href="{{ route('backend.dashboard') }}" class="{{ request()->routeIs('backend.*') ? 'active' : '' }}">Painel</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm">Sair</button>
                </form>
            </li>
        @else
            <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Autenticação</a></li>
        @endauth
    </ul>
</nav>