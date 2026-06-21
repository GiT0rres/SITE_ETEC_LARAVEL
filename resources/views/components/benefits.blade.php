<section class="destaques">
    <div class="container">
        <p class="destaques-title">Destaques</p>
        <div class="destaques-grid">
            @forelse($destaques as $destaque)
                <div class="card">
                    <div class="card-img">
                        <div class="card-img-placeholder">Imagem</div>
                    </div>
                    <div class="card-body">
                        <span class="card-tag">{{ $destaque->categoria }}</span>
                        <h3 class="card-title">{{ $destaque->titulo }}</h3>
                        <p class="card-desc">{{ Str::limit($destaque->descricao, 90) }}</p>
                        <a href="{{ route('cursos.index') }}" class="btn btn-outline btn-sm">Saiba Mais</a>
                    </div>
                </div>
            @empty
                @foreach([['Título do Destaque', 'Notícia', 'Breve descrição do destaque ou notícia.'],['Título do Destaque','Evento','Breve descrição do destaque ou notícia.'],['Título do Destaque','Curso','Breve descrição do destaque ou notícia.']] as $d)
                <div class="card">
                    <div class="card-img">
                        <div class="card-img-placeholder">Imagem</div>
                    </div>
                    <div class="card-body">
                        <span class="card-tag">{{ $d[1] }}</span>
                        <h3 class="card-title">{{ $d[0] }}</h3>
                        <p class="card-desc">{{ $d[2] }}</p>
                        <a href="{{ route('cursos.index') }}" class="btn btn-outline btn-sm">Saiba Mais</a>
                    </div>
                </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>