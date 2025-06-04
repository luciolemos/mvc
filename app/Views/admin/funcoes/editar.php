<div class="container">
    <h2 class="text-<?= isset($registro) ? 'success' : 'primary' ?>">
        <i class="bi bi-person-gear me-2"></i>
        <?= isset($registro) ? 'Editar função' : 'Nova função' ?>
    </h2>
    <p class="lead text-muted">Bem-vindo, admin! Aqui você altera as características das funções</p>
    <hr>
    <?php include __DIR__ . '/_form.php'; ?>
</div>

