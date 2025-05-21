<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>MyApp MVC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Externos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/main.css">

    <style>
        .navbar-nav .nav-link { transition: all 0.3s ease; }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">

<?php
$current = $_GET['url'] ?? 'home';
$segments = explode('/', $current);
$mainRoute = $segments[0] ?? 'home';
$subRoute  = $segments[1] ?? null;
?>

<!-- 🔝 Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand ms-1" href="<?= BASE_URL ?>">
            <img src="<?= BASE_URL ?>assets/images/Full stack2.png" alt="Logo" class="brand-logo" height="40">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Itens de navegação -->
                <li class="nav-item">
                    <a class="nav-link <?= $mainRoute === 'home' ? 'active border-bottom border-2 pb-1' : '' ?>" href="<?= BASE_URL ?>home">
                        INÍCIO
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $mainRoute === 'about' ? 'active border-bottom border-2 pb-1' : '' ?>" href="<?= BASE_URL ?>about">
                      SOBRE
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= $mainRoute === 'blog' ? 'active border-bottom border-2 pb-1' : '' ?>" href="<?= BASE_URL ?>blog">
                       BLOG
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $mainRoute === 'contact' ? 'active border-bottom border-2 pb-1' : '' ?>" href="<?= BASE_URL ?>contact">
                    CONTATO
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link <?/*= $mainRoute === 'status' ? 'active border-bottom border-2 pb-1' : '' */?>" href="<?/*= BASE_URL */?>status">
                    STATUS
                    </a>
                </li>-->


                <!-- LOGIN ADMIN -->
                <li class="nav-item">
                    <a class="nav-link<?= $mainRoute === 'admin' ? 'active' : '' ?>" target="_blank"
                       href="<?= BASE_URL ?>admin/auth">
                        <i class="bi bi-person-lock me-1"></i> LOGIN
                    </a>
                </li>

                <!-- ADMINISTRAÇÃO -->
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?/*= $mainRoute === 'admin' || $mainRoute === 'coverage' ? 'active border-bottom border-2 pb-1' : '' */?>" href="#" data-bs-toggle="dropdown">
                       ADMINISTRAÇÃO
                    </a>
                    <?php
/*                    $adminMenu = [
                        'admin' => ['label' => 'Login Seguro', 'emoji' => '🔑'],
                        'coverage' => ['label' => 'Relatório de Testes', 'emoji' => '📊'],
                        'produtos' => ['label' => 'Produtos', 'emoji' => '📦'],
                        'clientes' => ['label' => 'Clientes', 'emoji' => '🧾'],
                        'users' => ['label' => 'Usuários', 'emoji' => '👥'],
                        'settings' => ['label' => 'Configurações', 'emoji' => '⚙️']
                    ];
                    */?>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <?php /*foreach ($adminMenu as $rota => $item): */?>
                            <li>
                                <a class="dropdown-item d-flex align-items-center <?/*= $mainRoute === $rota ? 'active' : '' */?>"
                                   href="<?/*= BASE_URL . ($rota === 'admin' ? 'admin' : 'admin/' . $rota) */?>">
                                    <span><?/*= $item['emoji'] */?> <?/*= $item['label'] */?></span>
                                </a>
                            </li>
                        <?php /*endforeach; */?>
                    </ul>
                </li>-->

                <!-- DOCUMENTAÇÃO -->
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?/*= $mainRoute === 'docs' ? 'active border-bottom border-2 pb-1' : '' */?>" href="#" data-bs-toggle="dropdown">
                       DOCUMENTAÇÃO
                    </a>
                    <?php
                /*                    $docs = [
                                        'estrutura' => ['label' => 'Estrutura do Projeto', 'emoji' => ''],
                                        'virtualhost' => ['label' => 'Virtual Host', 'emoji' => ''],
                                        'composer' => ['label' => 'composer.json', 'emoji' => ''],
                                        'diagrama' => ['label' => 'Diagrama de Classes', 'emoji' => ''],
                                        'fluxomvc' => ['label' => 'Fluxo MVC', 'emoji' => ''],
                                        'fluxopost' => ['label' => 'Fluxo POST', 'emoji' => ''],
                                        'novofluxomvc' => ['label' => 'Entenda o Fluxo MVC', 'emoji' => ''],
                                        'caracteristicas' => ['label' => 'Características', 'emoji' => ''],
                                        'blog' => ['label' => 'Blog', 'emoji' => ''],
                                    ];
                                    */?>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        <?php /*foreach ($docs as $rota => $item): */?>
                            <li>
                                <a class="dropdown-item d-flex justify-content-between align-items-center <?/*= ($mainRoute === 'docs' && $subRoute === $rota) ? 'active' : '' */?>"
                                   href="<?/*= BASE_URL */?>docs/<?/*= $rota */?>">
                                    <span><?/*= $item['emoji'] */?> <?/*= $item['label'] */?></span>
                                    <?/*= ($mainRoute === 'docs' && $subRoute === $rota) ? '<i class="bi bi-chevron-left"></i>' : '' */?>
                                </a>
                            </li>
                        <?php /*endforeach; */?>
                    </ul>
                </li>-->

            </ul>
        </div>
    </div>
</nav>
