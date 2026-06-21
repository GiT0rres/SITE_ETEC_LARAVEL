<div class="backend-topbar">
    <a href="{{ route('home') }}" class="brand">
        <div class="navbar-logo">E</div>
        <div class="brand-name">
            ETEC
            <small>Zona Leste</small>
        </div>
    </a>
    <div class="topbar-user">
        <span>Olá, {{ Auth::user()->name }}</span>
        <div class="user-avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline btn-sm">Sair</button>
        </form>
    </div>
</div>