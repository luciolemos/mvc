<div class="container py-5">
    <div class="container mb-5">

        <!-- 💬 Formulário -->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg mt-5 border-0">
                    <!-- Cabeçalho primário -->
                    <div class="text-center mt-4 mb-4">
                        <h4 class="fw-bold text-dark"><i class="bi bi-chat-left-text me-2"></i>Fale Conosco</h4>
                        <!--<p class="text-muted small">Preencha o formulário abaixo</p>-->
                    </div>

                    <div class="card-body">
                        <!-- Mensagens de status -->
                        <?php if (!empty($_GET['ok'])): ?>
                            <div class="alert alert-success">
                                <i class="bi bi-check2"></i> Mensagem enviada com sucesso! Entraremos em contato em breve.
                            </div>
                        <?php elseif (!empty($_GET['erro']) && $_GET['erro'] === 'recaptcha'): ?>
                            <div class="alert alert-danger">
                                ⚠️ Validação de segurança falhou. Marque o reCAPTCHA corretamente.
                            </div>
                        <?php elseif (!empty($_GET['erro'])): ?>
                            <div class="alert alert-danger">
                                ❌ Ocorreu um erro ao enviar. Tente novamente.
                            </div>
                        <?php endif; ?>

                        <!-- Formulário -->
                        <form method="POST" action="<?= BASE_URL ?>contact/send">
                            <div class="mb-3">
                                <label for="nome" class="form-label fw-medium">Nome completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="mensagem" class="form-label fw-medium">Mensagem</label>
                                <textarea name="mensagem" id="mensagem" rows="1" class="form-control" required></textarea>
                            </div>

                            <!-- reCAPTCHA -->
                            <div class="mb-3">
                                <div class="d-flex justify-content-center">
                                    <div class="g-recaptcha" data-sitekey="<?= RECAPTCHA_SITE_KEY ?>"></div>
                                </div>
                            </div>

                            <!-- Botão -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-send me-1"></i> Enviar Mensagem
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
        </div>
    </div>
</div>


<!-- Google reCAPTCHA Script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const url = new URL(window.location);
        const paramsToRemove = ['ok', 'erro'];

        let shouldUpdate = false;

        paramsToRemove.forEach(param => {
            if (url.searchParams.has(param)) {
                url.searchParams.delete(param);
                shouldUpdate = true;
            }
        });

        if (shouldUpdate) {
            window.history.replaceState({}, document.title, url.pathname + url.search);
        }
    });
</script>

