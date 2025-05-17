<div class="row justify-content-center mb-5">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg mt-5 border-0">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Painel Administrativo</h4>
            </div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" action="<?= BASE_URL ?>admin/login">
                    <div class="mb-3">
                        <label for="username" class="form-label">Usuário</label>
                        <input type="text" name="username" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Entrar
                        </button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-center small text-muted">
                &copy; PHP Full-Stack <?= date('Y') ?> • Acesso restrito
            </div>
        </div>
    </div>
</div>
