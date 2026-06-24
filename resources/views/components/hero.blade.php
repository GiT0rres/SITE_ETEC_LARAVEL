<section class="hero">
    <div class="hero-slider">
        <button class="hero-nav-btn prev" onclick="heroSlide(-1)">&#8592;</button>

        <div class="hero-slide active">
            <div class="hero-slide-text">
                <p class="hero-eyebrow">Educação Pública de Qualidade</p>
                <h1 class="hero-title">Bem-vindo à<br><span>ETEC Zona Leste</span></h1>
                <p class="hero-desc">Preparando profissionais para o futuro com cursos técnicos e especializações reconhecidas pelo mercado.</p>
                <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-lg">Saiba Mais</a>
            </div>
            <div class="hero-slide-img">
                <img src="{{ asset('images/etec1.jpg') }}" alt="Campus ETEC Zona Leste" class="hero-img">
            </div>
        </div>

        <div class="hero-slide">
            <div class="hero-slide-text">
                <p class="hero-eyebrow">Cursos Técnicos</p>
                <h1 class="hero-title">Sua carreira<br><span>começa aqui</span></h1>
                <p class="hero-desc">Mais de 10 cursos técnicos nas áreas de tecnologia, saúde, administração e muito mais.</p>
                <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-lg">Ver Cursos</a>
            </div>
            <div class="hero-slide-img">
                <img src="{{ asset('images/etec2.jpg') }}" alt="Cursos técnicos" class="hero-img">
            </div>
        </div>

        <div class="hero-slide">
            <div class="hero-slide-text">
                <p class="hero-eyebrow">Próximos Eventos</p>
                <h1 class="hero-title">Palestras &<br><span>Atividades</span></h1>
                <p class="hero-desc">Participe de palestras, workshops e atividades culturais organizadas pela ETEC Zona Leste.</p>
                <a href="{{ route('eventos.index') }}" class="btn btn-primary btn-lg">Ver Eventos</a>
            </div>
            <div class="hero-slide-img">
                <img src="{{ asset('images/etec3.jpg') }}" alt="Eventos ETEC Zona Leste" class="hero-img">
            </div>
        </div>

        <button class="hero-nav-btn next" onclick="heroSlide(1)">&#8594;</button>
    </div>

    <div class="hero-dots">
        <button class="hero-dot active" onclick="goToSlide(0)"></button>
        <button class="hero-dot" onclick="goToSlide(1)"></button>
        <button class="hero-dot" onclick="goToSlide(2)"></button>
    </div>
</section>

<script>
let currentSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const dots   = document.querySelectorAll('.hero-dot');
function showSlide(n) {
    slides[currentSlide].classList.remove('active');
    dots[currentSlide].classList.remove('active');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.add('active');
    dots[currentSlide].classList.add('active');
}
function heroSlide(dir) { showSlide(currentSlide + dir); }
function goToSlide(n)   { showSlide(n); }
setInterval(() => heroSlide(1), 5000);
</script>