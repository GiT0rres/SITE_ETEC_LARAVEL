<!-- Seção de destaques exibida na página inicial -->
<section class="destaques">

    <div class="container">

        <!-- Título da seção -->
        <p class="destaques-title">Destaques</p>

        <!-- Grade que exibe os cursos em destaque -->
        <div class="destaques-grid">

            <!-- Percorre a coleção de cursos em destaque -->
            @forelse($destaques as $destaque)

                <!-- Card individual de curso -->
                <div class="card">

                    <!-- Área da imagem do curso -->
                    <div class="card-img">

                        <!-- Verifica se o curso possui imagem cadastrada -->
                        @if ($destaque->imagem)

                            <!-- Exibe a imagem armazenada -->
                            <img src="{{ Storage::url($destaque->imagem) }}"
                                 alt="{{ $destaque->nome }}"
                                 class="card-img-real">

                        @else

                            <!-- Placeholder caso não exista imagem -->
                            <div class="card-img-placeholder">
                                Imagem
                            </div>

                        @endif

                    </div>

                    <!-- Conteúdo textual do card -->
                    <div class="card-body">

                        <!-- Tipo do curso -->
                        <span class="card-tag">
                            {{ $destaque->tipo }}
                        </span>

                        <!-- Nome do curso -->
                        <h3 class="card-title">
                            {{ $destaque->nome }}
                        </h3>

                        <!-- Descrição resumida do curso -->
                        <p class="card-desc">
                            {{ Str::limit($destaque->descricao, 90) }}
                        </p>

                        <!-- Botão para visualizar detalhes do curso -->
                        <a href="{{ route('cursos.show', $destaque) }}"
                           class="btn btn-outline btn-sm">
                            Saiba Mais
                        </a>

                    </div>

                </div>

            @empty

                <!-- Mensagem exibida quando não há cursos cadastrados -->
                <p class="destaques-empty">
                    Nenhum curso disponível no momento.
                </p>

            @endforelse

        </div>

    </div>

</section>