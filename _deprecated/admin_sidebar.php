<aside class="admin-sidebar bg-dark text-white">
    <div class="d-flex flex-column h-100">
        <div class="p-3 border-bottom border-secondary">
            <span class="text-uppercase small fw-bold">Menu Principal</span>
        </div>

        <ul class="nav flex-column px-2 flex-grow-1">
            <!-- INÍCIO -->
            <li class="nav-item">
                <a href="<?= BASE_URL ?>admin/dashboard"
                   class="nav-link text-white py-2 px-3 rounded <?= $subRoute === 'dashboard' ? 'active' : '' ?>">
                    <i class="bi bi-house-door-fill me-2"></i> Início
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- GESTÃO DE CONTEÚDO -->
            <li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded <?= in_array($subRoute, ['posts', 'categorias']) ? '' : 'collapsed' ?>"
                   data-bs-toggle="collapse" href="#gestaoCollapse" role="button"
                   aria-expanded="<?= in_array($subRoute, ['posts']) ? 'true' : 'false' ?>">
                    <span><i class="bi bi-book me-2"></i> Gestão de Conteúdo</span>
                    <i class="bi bi-chevron-down small transition-all"></i>
                </a>
                <div class="collapse <?= in_array($subRoute, ['posts']) ? 'show' : '' ?>" id="gestaoCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/posts"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'posts' ? 'active' : '' ?>">
                                <i class="bi bi-journal-text me-1"></i> Posts
                            </a>
                        </li>
                        <!--                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/categorias"
                               class="nav-link text-white py-1 px-3 small rounded <?/*= $subRoute === 'categorias' ? 'active' : '' */?>">
                                <i class="bi bi-tags me-1"></i> Categorias
                            </a>
                        </li>-->
                    </ul>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- GESTÃO DE PESSOAL -->
            <li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded <?= in_array($subRoute, ['pessoal', 'cadastrarfuncionario' ,'funcoes']) ? '' : 'collapsed' ?>"
                   data-bs-toggle="collapse" href="#gestaoiiCollapse" role="button"
                   aria-expanded="<?= in_array($subRoute, ['pessoal', 'cadastrarfuncionario', 'funcoes']) ? 'true' : 'false' ?>">
                    <span><i class="bi bi-people me-2"></i> Gestão de Pessoal</span>
                    <i class="bi bi-chevron-down small transition-all"></i>
                </a>
                <div class="collapse <?= in_array($subRoute, ['pessoal', 'cadastrarfuncionario', 'funcoes']) ? 'show' : '' ?>" id="gestaoiiCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/pessoal"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'pessoal' ? 'active' : '' ?>">
                                <i class="bi bi-list-columns-reverse me-1"></i> Funcionários
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/pessoal/cadastrarfuncionario"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'cadastrarfuncionario' ? 'active' : '' ?>">
                                <i class="bi bi-person-plus me-1"></i> Cadastrar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/funcoes"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'funcoes' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Funções
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- GESTÃO DE EQP -->
            <li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded <?= in_array($subRoute, ['equipamentos', 'categorias']) ? '' : 'collapsed' ?>"
                   data-bs-toggle="collapse" href="#eqpCollapse" role="button"
                   aria-expanded="<?= in_array($subRoute, ['equipamentos', 'categorias']) ? 'true' : 'false' ?>">
                    <span><i class="bi bi-tools me-2"></i> Equipamentos</span>
                    <i class="bi bi-chevron-down small transition-all"></i>
                </a>
                <div class="collapse <?= in_array($subRoute, ['equipamentos', 'categorias']) ? 'show' : '' ?>" id="eqpCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/equipamentos"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'equipamentos' ? 'active' : '' ?>">
                                <i class="bi bi-list-columns-reverse me-1"></i> Equipamentos
                            </a>
                        </li>
                        <!--                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/equipamentos/cadastrar"
                               class="nav-link text-white py-1 px-3 small rounded <?/*= $subRoute === 'cadastrar' ? 'active' : '' */?>">
                                <i class="bi bi-person-plus me-1"></i> Cadastrar
                            </a>
                        </li>-->
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/categorias"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'categorias' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Categorias
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- GESTÃO DE OBRAS E SERVIÇOS -->
            <li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded <?= in_array($subRoute, ['obras']) ? '' : 'collapsed' ?>"
                   data-bs-toggle="collapse" href="#obrasCollapse" role="button"
                   aria-expanded="<?= in_array($subRoute, ['obras']) ? 'true' : 'false' ?>">
                    <span><i class="bi bi-bricks me-2"></i> Obras e serviços</span>
                    <i class="bi bi-chevron-down small transition-all"></i>
                </a>
                <div class="collapse <?= in_array($subRoute, ['obras']) ? 'show' : '' ?>" id="obrasCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/obras"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'obras' ? 'active' : '' ?>">
                                <i class="bi bi-list-columns-reverse me-1"></i> Obras
                            </a>
                        </li>
                        <!--                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/obras/cadastrar"
                               class="nav-link text-white py-1 px-3 small rounded <?/*= $subRoute === 'cadastrar' ? 'active' : '' */?>">
                                <i class="bi bi-person-plus me-1"></i> Cadastrar
                            </a>
                        </li>-->
                        <!--                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/obras/cadastrar"
                               class="nav-link text-white py-1 px-3 small rounded <?/*= $subRoute === 'cadastrar' ? 'active' : '' */?>">
                                <i class="bi bi-tags me-1"></i> Cadastrar
                            </a>
                        </li>-->
                    </ul>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- OBRAS -->
            <!--<li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded"
                   data-bs-toggle="collapse" href="#obrasCollapse" role="button" aria-expanded="false">
                    <span><i class="bi bi-bricks"></i> Obras e serviços</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse <?/*= $mainRoute === 'obras' ? 'show' : '' */?>" id="obrasCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/obras"
                               class="nav-link text-white py-1 px-3 small <?/*= $subRoute === 'obras' ? 'bg-secondary' : '' */?>">
                                <i class="bi bi-list-columns-reverse me-1"></i> Listar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/obras/cadastrar"
                               class="nav-link text-white py-1 px-3 small <?/*= $subRoute === 'cadastrar' ? 'bg-secondary' : '' */?>">
                                <i class="bi bi-plus-circle me-1"></i> Cadastrar
                            </a>
                        </li>
                    </ul>
                </div>
            </li>-->
            <!-- Divider -->
            <!--            <hr class="sidebar-divider my-0">-->

            <!-- DOC -->
            <li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded <?= in_array($subRoute, [
                    'docs',
                    'caracteristicas',
                    'estrutura',
                    'virtualhost',
                    'composer',
                    'fluxomvc',
                    'fluxopost',
                    'diagrama',
                    'elements',
                    'scripts',
                    'blog',
                    'novofluxomvc'

                ]) ? '' : 'collapsed' ?>"
                   data-bs-toggle="collapse" href="#docCollapse" role="button"
                   aria-expanded="<?= in_array($subRoute, [
                       'docs',
                       'caracteristicas',
                       'estrutura',
                       'virtualhost',
                       'composer',
                       'fluxomvc',
                       'fluxopost',
                       'diagrama',
                       'elements',
                       'scripts',
                       'blog',
                       'novofluxomvc'
                   ]) ? 'true' : 'false' ?>">
                    <span><i class="bi bi-folder me-2"></i> Documentação</span>
                    <i class="bi bi-chevron-down small transition-all"></i>
                </a>
                <div class="collapse <?= in_array($subRoute, [
                    'docs',
                    'caracteristicas',
                    'estrutura',
                    'virtualhost',
                    'composer',
                    'fluxomvc',
                    'fluxopost',
                    'diagrama',
                    'elements',
                    'scripts',
                    'blog',
                    'novofluxomvc'
                ]) ? 'show' : '' ?>" id="docCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'docs' ? 'active' : '' ?>">
                                <i class="bi bi-journal-text me-1"></i> Índice
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/caracteristicas"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'caracteristicas' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Características
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/estrutura"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'estrutura' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Estrutura
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/virtualhost"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'virtualhost' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Virtual host
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/composer"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'composer' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Composer
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/fluxomvc"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'fluxomvc' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Fluxo MVC
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/fluxopost"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'fluxopost' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Fluxo Posts Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/diagrama"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'diagrama' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Diagrama
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/elements"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'elements' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Elementos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/scripts"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'scripts' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> SQL
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/blog"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'blog' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Blog
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= BASE_URL ?>admin/docs/novofluxomvc"
                               class="nav-link text-white py-1 px-3 small rounded <?= $subRoute === 'novofluxomvc' ? 'active' : '' ?>">
                                <i class="bi bi-tags me-1"></i> Novo fluxo MVC
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- CONSTRUÇÃO CIVIL -->
            <!--<li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded"
                   data-bs-toggle="collapse" href="#opusCollapse" role="button" aria-expanded="false">
                    <span><i class="bi bi-buildings me-2"></i> Construção civil</span>
                    <i class="bi bi-chevron-down small"></i>
                </a>
                <div class="collapse <?/*= $mainRoute === 'pessoal' ? 'show' : '' */?>" id="opusCollapse">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/pessoal"
                               class="nav-link text-white py-1 px-3 small <?/*= $subRoute === 'pessoal' ? 'bg-secondary' : '' */?>">
                                <i class="bi bi-people me-1"></i> Pessoal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/obras"
                               class="nav-link text-white py-1 px-3 small <?/*= $subRoute === 'obras' ? 'bg-secondary' : '' */?>">
                                <i class="bi bi-bricks me-1"></i> Gestão da obra
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?/*= BASE_URL */?>admin/equipamentos"
                               class="nav-link text-white py-1 px-3 small <?/*= $subRoute === 'equipamentos' ? 'bg-secondary' : '' */?>">
                                <i class="bi bi-tools me-1"></i> Ferramentas
                            </a>
                        </li>
                    </ul>
                </div>
            </li>-->
            <!-- Divider -->
            <!--            <hr class="sidebar-divider my-0">-->

            <!--<li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded <?/*= $mainRoute === 'pessoal' ? 'active' : '' */?>"
                   href="<?/*= BASE_URL */?>admin/pessoal">
                    <span><i class="bi bi-person-lines-fill me-2"></i> Equipe</span>
                </a>
            </li>-->
            <!-- Divider -->
            <!--            <hr class="sidebar-divider my-0">-->

            <!-- CONFIGURAÇÕES -->
            <li class="nav-item">
                <a class="nav-link text-white py-2 px-3 d-flex justify-content-between align-items-center rounded"
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
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        </ul>

        <div class="mt-auto p-3 border-top border-secondary text-center text-secondary small">
            <span>v1.0.0</span>
            <span class="d-block">© PHP Full-Stack <?/*= date('Y') */?></span>
        </div>

    </div>
</aside>