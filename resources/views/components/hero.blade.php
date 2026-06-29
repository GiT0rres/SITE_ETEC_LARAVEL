<!-- Seção principal de destaque da página inicial -->
<section class="hero">

    <!-- Container do slider/carrossel -->
    <div class="hero-slider">

        <!-- Botão para voltar ao slide anterior -->
        <button class="hero-nav-btn prev" onclick="heroSlide(-1)">
            &#8592;
        </button>

        <!-- Slide 1 - Apresentação institucional -->
        <div class="hero-slide active">

            <!-- Conteúdo textual do slide -->
            <div class="hero-slide-text">
                <p class="hero-eyebrow">Educação Pública de Qualidade</p>

                <h1 class="hero-title">
                    Bem-vindo à<br>
                    <span>ETEC Zona Leste</span>
                </h1>

                <p class="hero-desc">
                    Preparando profissionais para o futuro com cursos técnicos e especializações reconhecidas pelo mercado.
                </p>

                <!-- Botão para página de cursos -->
                <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-lg">
                    Saiba Mais
                </a>
            </div>

            <!-- Imagem ilustrativa do campus -->
            <div class="hero-slide-img">
                <img src="{{ asset('images/etec1.jpg') }}"
                     alt="Campus ETEC Zona Leste"
                     class="hero-img">
            </div>

        </div>

        <!-- Slide 2 - Divulgação dos cursos -->
        <div class="hero-slide">

            <div class="hero-slide-text">
                <p class="hero-eyebrow">Cursos Técnicos</p>

                <h1 class="hero-title">
                    Sua carreira<br>
                    <span>começa aqui</span>
                </h1>

                <p class="hero-desc">
                    Mais de 10 cursos técnicos nas áreas de tecnologia, saúde, administração e muito mais.
                </p>

                <!-- Botão para visualizar todos os cursos -->
                <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-lg">
                    Ver Cursos
                </a>
            </div>

            <!-- Imagem relacionada aos cursos técnicos -->
            <div class="hero-slide-img">
                <img src="{{ asset('images/etec2.jpg') }}"
                     alt="Cursos técnicos"
                     class="hero-img">
            </div>

        </div>

        <!-- Slide 3 - Divulgação de eventos -->
        <div class="hero-slide">

            <div class="hero-slide-text">
                <p class="hero-eyebrow">Próximos Eventos</p>

                <h1 class="hero-title">
                    Palestras &<br>
                    <span>Atividades</span>
                </h1>

                <p class="hero-desc">
                    Participe de palestras, workshops e atividades culturais organizadas pela ETEC Zona Leste.
                </p>

                <!-- Botão para acessar a página de eventos -->
                <a href="{{ route('eventos.index') }}" class="btn btn-primary btn-lg">
                    Ver Eventos
                </a>
            </div>

            <!-- Imagem relacionada aos eventos -->
            <div class="hero-slide-img">
                <img src="{{ asset('images/etec3.jpeg') }}"
                     alt="Eventos ETEC Zona Leste"
                     class="hero-img">
            </div>

        </div>

        <!-- Botão para avançar para o próximo slide -->
        <button class="hero-nav-btn next" onclick="heroSlide(1)">
            &#8594;
        </button>

    </div>

    <!-- Indicadores de navegação dos slides -->
    <div class="hero-dots">

        <!-- Indicador do slide 1 -->
        <button class="hero-dot active" onclick="goToSlide(0)"></button>

        <!-- Indicador do slide 2 -->
        <button class="hero-dot" onclick="goToSlide(1)"></button>

        <!-- Indicador do slide 3 -->
        <button class="hero-dot" onclick="goToSlide(2)"></button>

    </div>

</section>

<script>

/* Índice do slide atualmente exibido */
let currentSlide = 0;

/* Lista de slides do carrossel */
const slides = document.querySelectorAll('.hero-slide');

/* Lista de indicadores (dots) */
const dots = document.querySelectorAll('.hero-dot');

/* Função responsável por exibir um slide específico */
function showSlide(n) {

    /* Remove a classe ativa do slide atual */
    slides[currentSlide].classList.remove('active');

    /* Remove a classe ativa do indicador atual */
    dots[currentSlide].classList.remove('active');

    /* Calcula o novo slide de forma circular */
    currentSlide = (n + slides.length) % slides.length;

    /* Ativa o novo slide */
    slides[currentSlide].classList.add('active');

    /* Ativa o indicador correspondente */
    dots[currentSlide].classList.add('active');
}

/* Avança ou retrocede os slides */
function heroSlide(dir) {
    showSlide(currentSlide + dir);
}

/* Vai diretamente para um slide específico */
function goToSlide(n) {
    showSlide(n);
}

/* Troca automaticamente de slide a cada 5 segundos */
setInterval(() => heroSlide(1), 5000);

</script>