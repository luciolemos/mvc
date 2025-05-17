<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="text-primary">📝 Blog</h1>
        <p class="lead text-muted">Artigos técnicos com PHP, MVC, deploy e mais.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php foreach ($posts as $post): ?>
            <div class="col" data-aos="fade-up">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title"><?= $post['titulo'] ?></h5>
                        <p class="card-text text-muted"><?= substr(strip_tags($post['conteudo']), 0, 100) ?>...</p>
                        <a href="<?= BASE_URL ?>blog/ver/<?= $post['slug'] ?>" class="btn btn-sm btn-outline-primary">Ler mais</a>
                    </div>
                    <div class="card-footer small text-muted">
                        Publicado em: <?= date('d/m/Y', strtotime($post['criado_em'])) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
