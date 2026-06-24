<aside class="backend-sidebar">
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('backend.dashboard') }}"
               class="{{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">&#8862;</span> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('backend.alunos.index') }}"
               class="{{ request()->routeIs('backend.alunos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9787;</span> Alunos
            </a>
        </li>
        <li>
            <a href="{{ route('backend.turmas.index') }}"
               class="{{ request()->routeIs('backend.turmas.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#8889;</span> Turmas
            </a>
        </li>
        <li>
            <a href="{{ route('backend.cursos.index') }}"
               class="{{ request()->routeIs('backend.cursos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9776;</span> Cursos
            </a>
        </li>
        <li>
            <a href="{{ route('backend.eventos.index') }}"
               class="{{ request()->routeIs('backend.eventos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9783;</span> Eventos
            </a>
        </li>
        <li>
            <a href="{{ route('backend.notas.index') }}"
               class="{{ request()->routeIs('backend.notas.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#10003;</span> Notas
            </a>
        </li>
        <li>
            <a href="{{ route('backend.relatorios.index') }}"
               class="{{ request()->routeIs('backend.relatorios.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#8965;</span> Relatórios
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