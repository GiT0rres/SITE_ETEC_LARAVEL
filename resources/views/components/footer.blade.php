{{-- Rodapé principal do site --}}
<footer class="footer">

    {{-- Grade de organização do conteúdo do rodapé --}}
    <div class="footer-grid">

        {{-- Área da marca/instituição --}}
        <div class="footer-brand">

            {{-- Logo da ETEC --}}
            <div class="navbar-logo" style="width:32px;height:32px;font-size:14px;">
                E
            </div>

            {{-- Slogan institucional --}}
            <p>Formando profissionais, transformando vidas.</p>
        </div>

        {{-- Coluna de links rápidos para navegação --}}
        <div class="footer-col">

            {{-- Título da seção --}}
            <h4>Links Rápidos</h4>

            {{-- Lista de links principais do sistema --}}
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('cursos.index') }}">Cursos</a></li>
                <li><a href="{{ route('eventos.index') }}">Eventos</a></li>
                <li><a href="{{ route('formulario.index') }}">Formulário</a></li>
                <li><a href="{{ route('login') }}">Autenticação</a></li>
            </ul>

        </div>

        {{-- Coluna de informações para contato --}}
        <div class="footer-col">

            {{-- Título da seção --}}
            <h4>Contato</h4>

            {{-- Dados de contato da instituição --}}
            <p>
                (11) 0000-0000<br>
                contato@eteczonaleste.edu.br<br>
                Rua das Etecs, 123<br>
                São Paulo – SP
            </p>

        </div>

    </div>

    {{-- Informação de direitos autorais --}}
    <p class="footer-copy">
        © 2024 ETEC Zona Leste. Todos os direitos reservados.
    </p>

</footer>