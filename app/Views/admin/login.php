<!-- app/Views/admin/login.php -->

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="card shadow p-4">
<!--            <h4 class="text-center text-primary mb-4"><i class="bi bi-shield-lock me-2"></i>Área Restrita</h4>-->
            <div class="text-center mt-4 mb-4">
                <h4 class="fw-bold text-dark"><i class="bi bi-shield-lock me-2"></i>Fale Conosco</h4>
            </div>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= $error ?></div>
            <?php endif; ?>

            <form action="<?= BASE_URL ?>admin/auth/login" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label fw-medium">Usuário</label>
                    <input type="text" name="username" id="username" class="form-control" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-medium">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                    </button>
                </div>
            </form>
            <!-- Rodapé (opcional) -->
            <div class="text-center mt-4 pt-3 border-top text-muted small">
                &copy; PHP Full-Stack <?= date('Y') ?>
            </div>
        </div>
    </div>
</div>
