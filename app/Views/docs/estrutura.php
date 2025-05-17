<div class="container py-5">

    <!-- TÍTULO -->
    <div class="text-center mb-5" data-aos="fade-down">
        <h1 class="text-primary">
            <i class="bi bi-diagram-3 me-2"></i>Estrutura do Projeto (MVC)
        </h1>
        <p class="lead text-muted">
            Entenda como o padrão <strong>MVC (Model-View-Controller)</strong> organiza o sistema com clareza, escalabilidade e separação de responsabilidades.
        </p>
    </div>

    <!-- O QUE É MVC -->
    <div class="mb-5" data-aos="fade-up">
        <h4 class="text-primary">
            <i class="bi bi-vector-pen me-2"></i>O que é MVC?
        </h4>
        <p>
            O <strong>Modelo–Visão–Controlador (MVC)</strong> é um dos padrões mais utilizados no desenvolvimento de software moderno.
            Ele divide a aplicação em três responsabilidades:
        </p>
        <ul>
            <li><i class="bi bi-database-check me-1 text-success"></i><strong>Model:</strong> dados e lógica de negócio (ex: banco, regras, validações)</li>
            <li><i class="bi bi-eye me-1 text-info"></i><strong>View:</strong> exibe a interface visual (HTML, layouts, páginas)</li>
            <li><i class="bi bi-gear-fill me-1 text-warning"></i><strong>Controller:</strong> recebe requisições, aciona o Model e decide qual View renderizar</li>
        </ul>
        <p>
            Essa separação facilita manutenção, testes, segurança e evolução do sistema.
        </p>
    </div>

    <!-- ESTRUTURA DE PASTAS -->
    <div class="mb-5" data-aos="fade-up">
        <h4 class="text-primary">
            <i class="bi bi-folder-fill me-2"></i>Estrutura Atual do Projeto
        </h4>

        <div class="position-relative bg-dark text-light rounded p-4 shadow-sm border border-primary">
            <button class="btn btn-sm btn-outline-light position-absolute top-0 end-0 m-2" onclick="copiarEstrutura()">
                <i class="bi bi-clipboard"></i> Copiar
            </button>

            <pre id="estruturaProjeto" class="mb-0"><code>mvc/
├── app/
│   ├── Controllers/
│   │   ├── AboutController.php        # Página "Sobre"
│   │   ├── AdminController.php        # Página "Admin"
│   │   ├── BlogtController.php        # Página "Blog"
│   │   ├── ContactController.php      # Contato + envio de email"
│   │   ├── CoverageController.php     # Página "Coverage"
│   │   ├── DocsController.php         # Páginas da documentação
│   │   ├── HomeController.php         # Página "Home"
│   │   ├── ReadmeController.php       # Página "Readme"
│   │   └── StatusController.php       # Página "Status"
│   ├── Core/
│   │   ├── App.php                    # Núcleo roteador
│   │   ├── Router.php                 # Interpreta a URL
│   │   └── Controller.php             # Base dos controllers
│   ├── Helpers/
│   │   └── SystemVersions.php         # Helpers para versão do sistema
│   ├── Models/
│   │   ├── Post.php                   # Post
│   │   └── User.php                   # (Opcional) Model de usuário
│   └── Views/
│       ├── home.php
│       ├── about.php
│       ├── contact.php
│       ├── readme.php
│       ├── layouts/
│       │   ├── main.php               # Layout base
│       │   ├── header.php             # Cabeçalho
│       │   └── footer.php             # Rodapé
│       ├── admin/
│       │   ├── login.php
│       │   └── dashboard.php
│       └── docs/
│           ├── estrutura.php
│           ├── composer.php
│           ├── virtualhost.php
│           ├── fluxomvc.php
│           ├── caracteristicas.php
│           └── diagrama.php
├── config/
│   └── config.php
├── public/
│   ├── index.php                     # Front controller
│   └── .htaccess                     # Reescrita de URL
├── vendor/
│   └── autoload.php                  # PSR-4 via Composer
├── composer.json
├── composer.lock
└── .env
</code></pre>
        </div>
    </div>

    <!-- EXPLICAÇÃO DOS DIRETÓRIOS -->
    <div class="mb-5" data-aos="fade-up">
        <h4 class="text-primary">
            <i class="bi bi-signpost-2-fill me-2"></i>Explicação dos Diretórios
        </h4>
        <ul>
            <li><strong><code>/app</code>:</strong> Lógica da aplicação</li>
            <ul>
                <li><code>Controllers/</code> – Valida dados e decide o que carregar</li>
                <li><code>Models/</code> – Dados e lógica de negócio</li>
                <li><code>Views/</code> – HTML/PHP das interfaces</li>
                <li><code>Core/</code> – Engine MVC, roteador e base Controller</li>
            </ul>
            <li><strong><code>/config</code>:</strong> Configurações da aplicação</li>
            <li><strong><code>/public</code>:</strong> Pasta acessada pelo navegador (com index.php e assets)</li>
            <li><strong><code>/vendor</code>:</strong> Pacotes do Composer</li>
            <li><strong><code>composer.json</code>:</strong> Lista dependências PHP</li>
            <li><strong><code>.env</code>:</strong> Variáveis de ambiente (.gitignore ativado)</li>
        </ul>
    </div>

</div>

<!-- SCRIPT COPIA -->
<script>
    function copiarEstrutura() {
        const texto = document.getElementById("estruturaProjeto").innerText;
        navigator.clipboard.writeText(texto)
            .then(() => alert("📦 Estrutura copiada para a área de transferência!"))
            .catch(err => alert("Erro ao copiar: " + err));
    }
</script>
