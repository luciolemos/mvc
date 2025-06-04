<?php
$q = $q ?? '';
$placeholder = 'Buscar funcionário por NOME...';
?>

<div class="container-fluid px-3 px-md-4 py-4">
    <div data-aos="fade-down">
        <h2 class="text-primary"><i class="bi bi-list-columns-reverse me-2"></i> Funcionários</h2>
        <p class="lead text-muted">Lista de funcionários cadastrados</p>
        <hr class="my-4">
        <div class="d-flex flex-column flex-md-row gap-2 order-md-2 w-100 w-md-auto justify-content-md-start mt-4 mb-4">
            <a href="<?= BASE_URL ?>admin/pessoal/cadastrar" class="btn btn-primary text-white order-md-1">
                <i class="bi bi-plus-circle"></i> Novo funcionário
            </a>
        </div>
    </div>
    <div data-aos="fade-up">
        <?php include __DIR__ . '/../../partials/search_bar.php'; ?>
    </div>

    <?php if (empty($pessoal)): ?>
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i> Não há funcionário com esse nome em nossa base dados.
        </div>
    <?php else: ?>
        <div class="table-responsive" data-aos="fade-up">
            <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th class="text-center">#</th>
                <th>CÓD</th>
                <th>NOME</th>
                <th class="text-center">CPF</th>
                <th>FUNÇÃO</th>
                <th>ADMISSÃO</th>
                <th>TELEFONE</th>
                <th>STATUS</th>
                <th class="text-end text-center">AÇÕES</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($pessoal as $p): ?>
                <?php
                $status = $p['status'] ?? 'Ativo';

                if ($status === 'Ativo') {
                    $badgeClass = 'bg-success';
                } elseif ($status === 'Afastado') {
                    $badgeClass = 'bg-warning';
                } elseif ($status === 'Férias') {
                    $badgeClass = 'bg-primary';
                } elseif ($status === 'Demitido') {
                    $badgeClass = 'bg-danger';
                } else {
                    $badgeClass = 'bg-secondary';
                }

                ?>
                <tr>
                    <td class="text-center"><i class="bi bi-person-fill text-primary"></i></td>
                    <td><?= htmlspecialchars($p['staff_id'] ?? '') ?></td>
                    <td><?= htmlspecialchars($p['nome'] ?? '') ?></td>
                    <td class="text-center"><?= htmlspecialchars($p['cpf'] ?? '') ?></td>
                    <td><?= htmlspecialchars($p['funcao'] ?? '') ?></td>
                    <td><span class="d-block"><?= date('d/m/Y', strtotime($p['data_admissao'])) ?></span></td>

                    <td><?= htmlspecialchars($p['telefone'] ?? '') ?></td>
                    <td><span class="badge <?= $badgeClass ?>"><?= $status ?></span></td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="<?= BASE_URL ?>admin/pessoal/editar/<?= $p['id'] ?>"
                               class="btn btn-sm btn-outline-primary"
                               data-bs-toggle="tooltip" data-bs-title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="<?= BASE_URL ?>admin/pessoal/deletar/<?= $p['id'] ?>"
                               class="btn btn-sm btn-outline-danger"
                               data-bs-toggle="tooltip" data-bs-title="Excluir"
                               onclick="return confirm('Deseja excluir este post?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php if (empty($pessoal)): ?>
                <tr>
                    <td colspan="9" class="text-center text-muted">Nenhum funcionário encontrado.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
        </div>
    <?php endif ?>
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div class="text-muted small">Total: <?= count($pessoal) ?> funcionários</div>
        <a href="<?= BASE_URL ?>admin" class="btn btn-primary text-white">
            <i class="bi bi-speedometer2 me-2"></i> Painel
        </a>
    </div>
</div>
