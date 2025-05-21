<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Administrativo - MyApp MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & ícones -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/css/admin.css" rel="stylesheet">
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark bg-dark sticky-top shadow-sm" style="height: 56px; z-index: 1040;">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>admin/dashboard">
            <i class="bi bi-kanban"></i> Painel Admin
        </a>
        <a href="<?= BASE_URL ?>admin/auth/logout" class="btn btn-outline-light btn-sm">
            <i class="bi bi-box-arrow-right"></i> Sair
        </a>
    </div>
</nav>

<div class="admin-layout d-flex">
    <!-- Sidebar -->
    <aside class="admin-sidebar bg-dark text-white">
        <div class="d-flex flex-column h-100">
            <div class="p-3 border-bottom border-secondary">
                <span class="text-uppercase small">Menu</span>
            </div>
            <ul class="nav flex-column px-2">

                <!-- INÍCIO -->
                <li class="nav-item">
                    <a href="<?= BASE_URL ?>admin/dashboard"
                       class="nav-link text-white py-2 px-3 rounded hover-effect <?= $subRoute === 'dashboard' ? 'bg-secondary' : '' ?>">
                        <i class="bi bi-house-door-fill me-2"></i> Início
                    </a>
                </li>

                <!-- GESTÃO DE CONTEÚDO -->
                <li class="nav-item">
                    <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center"
                       data-bs-toggle="collapse" href="#gestaoCollapse" role="button" aria-expanded="false">
                        <span><i class="bi bi-folder me-2"></i> Gestão de Conteúdo</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse <?= in_array($subRoute, ['posts', 'categorias']) ? 'show' : '' ?>" id="gestaoCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/posts"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'posts' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-journal-text me-1"></i> Posts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/categorias"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'categorias' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-tags me-1"></i> Categorias
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- GESTÃO DE PESSOAL -->
                <li class="nav-item mt-2">
                    <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center"
                       data-bs-toggle="collapse" href="#pessoalCollapse" role="button" aria-expanded="false">
                        <span><i class="bi bi-people-fill me-2"></i> Gestão de Pessoal</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse <?= in_array($subRoute, ['usuarios']) ? 'show' : '' ?>" id="pessoalCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/usuarios"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'usuarios' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-person-lines-fill me-1"></i> Usuários
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- DOCUMENTAÇÃO -->
                <li class="nav-item mt-2">
                    <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center"
                       data-bs-toggle="collapse" href="#documentacaoCollapse" role="button" aria-expanded="false">
                        <span><i class="bi bi-folder me-2"></i> Documentação</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse <?= $mainRoute === 'docs' ? 'show' : '' ?>" id="documentacaoCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/estrutura"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'estrutura' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-diagram-3 me-1"></i> Estrutura
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/virtualhost"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'virtualhost' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-hdd-rack me-1"></i> Virtual Host
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/composer"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'composer' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-box-seam me-1"></i> Composer
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/fluxomvc"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'fluxomvc' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-arrow-repeat me-1"></i> Fluxo MVC
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/fluxopost"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'fluxopost' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-diagram-2 me-1"></i> Fluxo POST
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/novofluxomvc"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'novofluxomvc' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-diagram-3-fill me-1"></i> Novo Fluxo
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/diagrama"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'diagrama' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-diagram-3 me-1"></i> Diagrama
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/caracteristicas"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'caracteristicas' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-star-fill me-1"></i> Características
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/blog"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'blog' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-journal-richtext me-1"></i> Blog
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/docs/elements"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'elements' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-journal-richtext me-1"></i> Elementos
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- CONFIGURAÇÕES -->
                <li class="nav-item mt-2">
                    <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center"
                       data-bs-toggle="collapse" href="#configCollapse" role="button" aria-expanded="false">
                        <span><i class="bi bi-gear me-2"></i> Configurações</span>
                        <i class="bi bi-chevron-down small"></i>
                    </a>
                    <div class="collapse <?= in_array($subRoute, ['status', 'versions', 'info']) ? 'show' : '' ?>" id="configCollapse">
                        <ul class="nav flex-column ms-3">
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/status"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'status' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-check-circle me-1"></i> Status
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/system/versions"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'versions' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-code-slash me-1"></i> Versões
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= BASE_URL ?>admin/system/info"
                                   class="nav-link text-white py-1 px-3 small <?= $subRoute === 'info' ? 'bg-secondary' : '' ?>">
                                    <i class="bi bi-info-circle me-1"></i> Info
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
            <div class="mt-auto p-3 small border-top border-secondary text-center text-secondary">
                <span>© <?= date('Y') ?> MyApp</span>
            </div>
        </div>
    </aside>
    <!-- Conteúdo Principal -->
    <main class="content-area flex-grow-1 p-4">
        <?php if (!empty($_SESSION['toast'])): ?>
            <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
                <div class="toast align-items-center text-white bg-<?= $_SESSION['toast']['type'] ?> border-0 show shadow" role="alert">
                    <div class="d-flex">
                        <div class="toast-body"><?= htmlspecialchars($_SESSION['toast']['message']) ?></div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['toast']); ?>
        <?php endif; ?>

        <?php
        if (isset($GLOBALS['view'])) {
            $path = '../app/Views/' . $GLOBALS['view'] . '.php';
            file_exists($path) ? require $path : print("<div class='alert alert-danger'>View <code>$path</code> não encontrada.</div>");
        }
        ?>
    </main>
</div>

<!-- Footer -->
<footer class="bg-dark text-light py-3 mt-auto admin-footer">
    <div class="container text-center">
        <p class="mb-0 small">
            &copy; PHP Full-Stack <?= date('Y') ?> —
            <a href="http://lattes.cnpq.br/6156274538172427" class="text-white text-decoration-none">
                <i>by</i> Lúcio Lemos
            </a>
        </p>
    </div>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const editor = document.querySelector('#conteudo');
        if (editor) ClassicEditor.create(editor).catch(err => console.error(err));
    });
</script>



<!-- JS e Scripts finais -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

<!-- Mermaid.js -->
<script type="module">
    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs';
    mermaid.initialize({ startOnLoad: true });
</script>

<!-- Copiar comandos -->
<script>
    function copiarComandos() {
        const texto = document.getElementById("blocoComandos").innerText;
        navigator.clipboard.writeText(texto).then(() => {
            alert("Comandos copiados!");
        }).catch(err => {
            alert("Erro ao copiar: " + err);
        });
    }
</script>


</body>
</html>
