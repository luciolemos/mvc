<!-- app/Views/admin/dashboard.php -->
<div class="container">
   <div data-aos="fade-down">
        <h2 class="text-primary"><i class="bi bi-speedometer2 me-2"></i> Painel Administrativo</h2>
        <p class="lead text-muted">Bem-vindo, admin! Aqui você gerencia o sistema.</p>
   </div>
   <hr class="my-4">

   <div class="row g-4" data-aos="fade-up">
        <!-- POSTS -->
       <div class="col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">📬 Posts</h5>
                        <p class="card-text small text-muted">Gerencie os artigos do seu blog.</p>
                    </div>
                    <a href="<?= BASE_URL ?>admin/posts" class="btn btn-primary btn-sm mt-3">
                        <i class="bi bi-pencil-square me-1"></i> Acessar
                    </a>
                </div>
            </div>
        </div>

        <!-- STATUS -->
        <div class="col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">⚙️ Status do Sistema</h5>
                        <p class="card-text small text-muted">Verifique ambiente, conexões e versões.</p>
                    </div>
                    <a href="<?= BASE_URL ?>admin/status" class="btn btn-primary btn-sm mt-3">
                        <i class="bi bi-gear me-1"></i> Visualizar
                    </a>
                </div>
            </div>
        </div>

        <!-- TESTES -->
        <div class="col-sm-6 col-lg-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="card-title">📊 Testes</h5>
                        <p class="card-text small text-muted">Relatórios PHPUnit com cobertura.</p>
                    </div>
                    <a href="<?= BASE_URL ?>coverage/html/index.html" target="_blank" class="btn btn-success btn-sm mt-3">
                        <i class="bi bi-bar-chart-line me-1"></i> Abrir
                    </a>
                </div>
            </div>
        </div>
   </div>
</div>
<hr class="mt-5">
<p class="text-end text-muted small">Última atualização: <?= date('d/m/Y') ?> • Desenvolvido com PHP</p>
