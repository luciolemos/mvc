<!-- AOS Animate on Scroll CSS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<div class="container py-5">

    <div class="container mb-5">
        <!-- 🧭 Cabeçalho -->
        <div class="text-center mb-2">
            <h1 class="text-primary"><i class="bi bi-envelope-at me-2 text-danger"></i>️Fale Conosco</h1>
            <p class="lead text-muted">Envie sua dúvida, sugestão ou feedback. Retornaremos o mais breve possível.</p>
        </div>

        <!-- 💬 Formulário -->
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg mt-5 border-0">
                    <!-- Cabeçalho primário -->
                    <div class="card-header bg-primary text-white text-center">
                        <h4 class="mb-0">Fale Conosco</h4>
                    </div>

                    <div class="card-body">
                        <!-- Mensagens de status -->
                        <?php if (!empty($_GET['ok'])): ?>
                            <div class="alert alert-success">
                                ✅ Mensagem enviada com sucesso! Entraremos em contato em breve.
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
                                <label for="nome" class="form-label">Nome completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="mensagem" class="form-label">Mensagem</label>
                                <textarea name="mensagem" id="mensagem" rows="1" class="form-control" required></textarea>
                            </div>


                            <!-- reCAPTCHA -->
                            <div class="mb-3">
                                <div class="recaptcha-wrapper">
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
                    </div>

                    <!-- Rodapé opcional -->
                    <div class="card-footer text-center small text-muted">
                        &copy; PHP Full-Stack <?= date('Y') ?> • Contato via formulário
                    </div>
                </div>
            </div>
        </div>


        <!-- 🔗 Navegação opcional -->
        <!--    <div class="d-grid gap-3 col-12 col-md-6 mx-auto mt-5" data-aos="fade-up">
        <a href="<?/*= BASE_URL */?>home" class="btn btn-outline-secondary">
            <i class="bi bi-house-door me-1"></i> Voltar para Início
        </a>
        <a href="<?/*= BASE_URL */?>readme" class="btn btn-outline-secondary">
            📘 Documentação Técnica
        </a>
    </div>-->
    </div>

</div>


<!-- Google reCAPTCHA Script -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- AOS SCRIPT -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
