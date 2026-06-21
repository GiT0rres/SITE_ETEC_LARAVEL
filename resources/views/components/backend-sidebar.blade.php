<aside class="backend-sidebar">
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('backend.dashboard') }}"
               class="{{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9632;</span> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('backend.alunos.index') }}"
               class="{{ request()->routeIs('backend.alunos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9650;</span> Alunos
            </a>
        </li>
        <li>
            <a href="{{ route('backend.turmas.index') }}"
               class="{{ request()->routeIs('backend.turmas.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9679;</span> Turmas
            </a>
        </li>
        <li>
            <a href="{{ route('backend.eventos.create') }}"
               class="{{ request()->routeIs('backend.eventos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9726;</span> Eventos
            </a>
        </li>
        <li>
            <a href="{{ route('backend.configuracoes') }}"
               class="{{ request()->routeIs('backend.configuracoes') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9881;</span> Configurações
            </a>
        </li>
    </ul>
</aside>