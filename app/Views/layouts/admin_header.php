<?php
use App\Helpers\RouteHelper;
extract(RouteHelper::currentSegments());
?>
<nav class="navbar navbar-expand navbar-dark bg-primary shadow-sm admin-navbar">
    <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="<?= BASE_URL ?>admin/dashboard">
            <i class="bi bi-kanban-fill me-2"></i>
            <span class="d-none d-sm-inline">Painel Admin</span>
        </a>

        <div class="d-flex ms-auto">
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle d-flex align-items-center" type="button"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle me-2"></i>
                    <span class="d-none d-md-inline">Admin</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Perfil</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Configurações</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item text-danger" href="<?= BASE_URL ?>admin/auth/logout">
                            <i class="bi bi-box-arrow-right me-2"></i>Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
