<div class="container py-5">

    <!-- 🔹 HERO PRINCIPAL -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h1 class="text-primary mb-3">
            <i class="bi bi-layers me-2"></i>Projeto Fullstack PHP — Da Estrutura ao Deploy
        </h1>

        <h5 class="fw-semibold text-muted mb-3">
            <i class="bi bi-hdd-network me-2"></i> Ubuntu • Apache • PHP • MySQL • MVC Design Pattern
        </h5>

        <p class="lead text-muted">
            Sistema modular, responsivo e escalável com arquitetura MVC moderna em PHP.
            Ideal para estudos técnicos, portfólios profissionais ou ambientes de produção.
        </p>
    </div>

    <!-- 🔸 FUNCIONALIDADES EM CARDS -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 text-center">
        <div class="col" data-aos="fade-up">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-diagram-3 fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Estrutura MVC</h5>
                    <p class="card-text">
                        Organização em camadas com separação clara de responsabilidades. Roteamento limpo e modularidade garantida.
                    </p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-shield-lock fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Login Seguro</h5>
                    <p class="card-text">
                        Painel protegido com sessão autenticada, reCAPTCHA e validações de entrada.
                    </p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-hdd-stack fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Ambiente Real</h5>
                    <p class="card-text">
                        Rodando direto de um servidor Ubuntu. Ferramentas e versões acessadas dinamicamente.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- 🔸 MAIS FUNCIONALIDADES -->
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5 text-center">
        <div class="col" data-aos="fade-up">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-easel2 fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Identidade Visual</h5>
                    <p class="card-text">
                        Layout elegante, responsivo, com uso criterioso de espaçamentos, cores e tipografia moderna.
                    </p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-up" data-aos-delay="100">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-journal-check fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Documentação Integrada</h5>
                    <p class="card-text">
                        Toda estrutura explicada via rotas públicas. PlantUML, Mermaid, README e conceitos.
                    </p>
                </div>
            </div>
        </div>

        <div class="col" data-aos="fade-up" data-aos-delay="200">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body">
                    <i class="bi bi-terminal-dash fs-1 text-primary mb-3"></i>
                    <h5 class="card-title">Código de Alta Legibilidade</h5>
                    <p class="card-text">
                        Comentários úteis, organização em pastas e aderência a padrões PSR.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- 📆 LINHA DO TEMPO -->
    <div class="mb-5 mt-5" data-aos="fade-up">
        <h4 class="text-primary mb-3">
            <i class="bi bi-clock-history me-2"></i>Funcionalidades em Fases
        </h4>
        <ul class="timeline list-unstyled ps-0">
            <li class="mb-2"><span class="text-success"><i class="bi bi-check2-square me-2"></i></span>Estrutura MVC com roteamento dinâmico</li>
            <li class="mb-2"><span class="text-success"><i class="bi bi-check2-square me-2"></i></span>Layout com Bootstrap 5 e navbar adaptável</li>
            <li class="mb-2"><span class="text-success"><i class="bi bi-check2-square me-2"></i></span>Login e controle de sessão protegida</li>
            <li class="mb-2"><span class="text-success"><i class="bi bi-check2-square me-2"></i></span>Dashboard dinâmico com versão de ferramentas</li>
            <li class="mb-2"><span class="text-success"><i class="bi bi-check2-square me-2"></i></span>Modal com teste de conexão PDO</li>
            <li class="mb-2"><span class="text-success"><i class="bi bi-check2-square me-2"></i></span>Documentação técnica via frontend</li>
            <!--<i class="bi bi-check-circle text-success me-2"></i>-->
        </ul>
    </div>

    <!-- 🧰 TECNOLOGIAS -->
    <div class="mb-5 mt-5 text-center" data-aos="zoom-in">
        <h4 class="text-primary mb-3">
            <i class="bi bi-stack me-2"></i>Stack & Ferramentas
        </h4>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <span class="badge bg-primary">PHP <?= phpversion() ?></span>
            <span class="badge bg-danger">MySQL <?= $mysqlVersion ?? '—' ?></span>
            <span class="badge bg-warning text-dark">Composer <?= $composerVersion ?? '—' ?></span>
            <span class="badge bg-success">Node.js <?= $nodeVersion ?? '—' ?></span>
            <span class="badge bg-success">npm <?= $npmVersion ?? '—' ?></span>
            <span class="badge bg-dark">Git</span>
            <span class="badge bg-dark">GitHub CLI</span>
            <span class="badge bg-info text-dark">Bootstrap 5</span>
        </div>
    </div>

    <!-- NAVEGAÇÃO -->
<!--    <div class="text-center mt-4" data-aos="fade-up">
        <a href="<?/*= BASE_URL */?>about" class="btn btn-outline-primary me-2 mb-2">
            <i class="bi bi-people me-2"></i> Sobre
        </a>
        <a href="<?/*= BASE_URL */?>docs/estrutura" class="btn btn-outline-success me-2 mb-2">
            <i class="bi bi-diagram-3-fill me-2"></i> Estrutura
        </a>
        <a href="<?/*= BASE_URL */?>docs/composer" class="btn btn-outline-danger me-2 mb-2">
            <i class="bi bi-box-seam me-2"></i> Composer
        </a>
        <a href="<?/*= BASE_URL */?>docs/virtualhost" class="btn btn-outline-secondary me-2 mb-2">
            <i class="bi bi-hdd-network me-2"></i> Virtual host
        </a>
    </div>-->

</div>
