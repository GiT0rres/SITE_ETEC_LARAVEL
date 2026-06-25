<!-- Barra lateral do painel administrativo -->
<aside class="backend-sidebar">

    <!-- Menu de navegação principal -->
    <ul class="sidebar-nav">

        <!-- Link para o Dashboard -->
        <li>
            <a href="{{ route('backend.dashboard') }}"
               class="{{ request()->routeIs('backend.dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">&#8862;</span> Dashboard
            </a>
        </li>

        <!-- Link para gerenciamento de alunos -->
        <li>
            <a href="{{ route('backend.alunos.index') }}"
               class="{{ request()->routeIs('backend.alunos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9787;</span> Alunos
            </a>
        </li>

        <!-- Link para gerenciamento de turmas -->
        <li>
            <a href="{{ route('backend.turmas.index') }}"
               class="{{ request()->routeIs('backend.turmas.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#8889;</span> Turmas
            </a>
        </li>

        <!-- Link para gerenciamento de cursos -->
        <li>
            <a href="{{ route('backend.cursos.index') }}"
               class="{{ request()->routeIs('backend.cursos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9776;</span> Cursos
            </a>
        </li>

        <!-- Link para visualização e gerenciamento de eventos -->
        <li>
            <a href="{{ route('backend.eventos.show') }}"
               class="{{ request()->routeIs('backend.eventos.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9783;</span> Eventos
            </a>
        </li>

        <!-- Link para lançamento e consulta de notas -->
        <li>
            <a href="{{ route('backend.notas.index') }}"
               class="{{ request()->routeIs('backend.notas.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#10003;</span> Notas
            </a>
        </li>

        <!-- Link para geração e consulta de relatórios -->
        <li>
            <a href="{{ route('backend.relatorios.index') }}"
               class="{{ request()->routeIs('backend.relatorios.*') ? 'active' : '' }}">
                <span class="sidebar-icon">&#8965;</span> Relatórios
            </a>
        </li>

        <!-- Link para configurações gerais do sistema -->
        <li>
            <a href="{{ route('backend.configuracoes') }}"
               class="{{ request()->routeIs('backend.configuracoes') ? 'active' : '' }}">
                <span class="sidebar-icon">&#9881;</span> Configurações
            </a>
        </li>

    </ul>
</aside>