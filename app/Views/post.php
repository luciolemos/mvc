<!-- app/Views/post.php -->

<div class="container py-5">

    <!-- 🧭 Cabeçalho do Post -->
    <div class="text-center mb-4" data-aos="fade-down">
        <h1 class="text-primary"><?= htmlspecialchars($post['titulo']) ?></h1>
        <p class="text-muted small">
            <i class="bi bi-person-circle me-1"></i><?= htmlspecialchars($post['autor'] ?: 'Anônimo') ?>
            •
            <i class="bi bi-calendar-event me-1"></i><?= date('d/m/Y H:i', strtotime($post['criado_em'])) ?>
        </p>
    </div>

    <!-- 📄 Conteúdo -->
    <div class="mb-5" data-aos="fade-up">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <?= nl2br($post['conteudo']) ?>
            </div>
        </div>
    </div>

    <!-- 🔗 Navegação -->
    <div class="text-center" data-aos="fade-up">
        <a href="<?= BASE_URL ?>blog" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Voltar para o Blog
        </a>
    </div>

</div>

