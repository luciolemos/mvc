<div class="container py-5">
    <h1 class="text-primary mb-3"><?= $post['titulo'] ?></h1>
    <p class="text-muted mb-4">Publicado em <?= date('d/m/Y', strtotime($post['criado_em'])) ?></p>
    <div class="border-start ps-3">
        <?= nl2br($post['conteudo']) ?>
    </div>
    <a href="<?= BASE_URL ?>blog" class="btn btn-outline-secondary mt-4">← Voltar para o Blog</a>
</div>

