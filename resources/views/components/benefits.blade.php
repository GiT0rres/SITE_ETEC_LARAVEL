<section class="destaques">
    <div class="container">
        <p class="destaques-title">Destaques</p>
        <div class="destaques-grid">
            @forelse($destaques as $destaque)
                <div class="card">
                    <div class="card-img">
                        @if ($destaque->imagem)
                            <img src="{{ Storage::url($destaque->imagem) }}" alt="{{ $destaque->nome }}" class="card-img-real">
                        @else
                            <div class="card-img-placeholder">Imagem</div>
                        @endif
                    </div>
                    <div class="card-body">
                        <span class="card-tag">{{ $destaque->tipo }}</span>
                        <h3 class="card-title">{{ $destaque->nome }}</h3>
                        <p class="card-desc">{{ Str::limit($destaque->descricao, 90) }}</p>
                        <a href="{{ route('cursos.show', $destaque) }}" class="btn btn-outline btn-sm">Saiba Mais</a>
                    </div>
                </div>
            @empty
                <p class="destaques-empty">Nenhum curso disponível no momento.</p>
            @endforelse
        </div>
    </div>
</section>