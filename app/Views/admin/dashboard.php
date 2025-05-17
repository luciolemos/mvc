<?php
// ℹ️ Coleta de dados do sistema
use App\Core\Database;

$mysqlVersion    = (new mysqli(DB_HOST, DB_USER, DB_PASS))->server_info ?? 'Indisponível';
$composerVersion = trim(shell_exec('composer --version 2>/dev/null')) ?: 'Indisponível';
$nodeVersion     = trim(shell_exec('node -v 2>/dev/null')) ?: 'Indisponível';
$npmVersion      = trim(shell_exec('npm -v 2>/dev/null')) ?: 'Indisponível';
$gitVersion      = trim(shell_exec('git --version 2>/dev/null')) ?: 'Indisponível';
$ghVersion       = strtok(trim(shell_exec('gh --version 2>/dev/null')), "\n") ?: 'Indisponível';
$xdebugVersion   = phpversion('xdebug') ?: 'Não instalado';

// Ubuntu
$ubuntuVersion = 'Desconhecida';
if (file_exists('/etc/os-release') && preg_match('/PRETTY_NAME="(.+)"/', file_get_contents('/etc/os-release'), $match)) {
    $ubuntuVersion = $match[1];
}

// Banco via PDO
try {
    $pdo = Database::connect();
    $dbStatus = 'Conexão bem sucedida!';
    $dbDetails = [
        'Banco de Dados'       => DB_NAME,
        'Usuário'              => DB_USER,
        'Driver'               => $pdo->getAttribute(PDO::ATTR_DRIVER_NAME),
        'Versão do Servidor'   => $pdo->getAttribute(PDO::ATTR_SERVER_VERSION),
    ];
} catch (PDOException $e) {
    $dbStatus = 'Falha na conexão: ' . $e->getMessage();
    $dbDetails = [];
}
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary">Painel Administrativo</h3>
        <a href="<?= BASE_URL ?>admin/logout" class="btn btn-outline-danger">
            <i class="bi bi-box-arrow-right me-1"></i> Sair
        </a>
    </div>

    <!-- ROW DE CARDS -->
    <div class="row row-cols-1 row-cols-lg-3 g-4">

        <!-- 🌐 Ambiente Web -->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">🌐 Ambiente Web</div>
                <div class="card-body">
                    <?php
                    $dadosWeb = [
                        'Servidor' => $_SERVER['SERVER_NAME'],
                        'Apache'   => $_SERVER['SERVER_SOFTWARE'],
                        'Porta'    => $_SERVER['SERVER_PORT']
                    ];
                    foreach ($dadosWeb as $label => $value): ?>
                        <div class="mb-2">
                            <label class="form-label"><?= $label ?></label>
                            <input type="text" class="form-control" value="<?= $value ?>" readonly>
                        </div>
                    <?php endforeach; ?>

                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalConexao">
                            <i class="bi bi-plug me-1"></i> Testar Conexão
                        </button>
                        <a href="<?= BASE_URL ?>coverage/html/index.html" target="_blank" class="btn btn-outline-success">
                            <i class="bi bi-bar-chart-line me-1"></i> Ver Cobertura de Testes
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- 🖥️ Informações do Servidor -->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">🖥️ Informações do Servidor</div>
                <div class="card-body">
                    <?php
                    $dadosServidor = [
                        'Host'           => gethostname(),
                        'IP do Servidor' => gethostbyname(gethostname()),
                        'Ubuntu'         => $ubuntuVersion
                    ];
                    foreach ($dadosServidor as $label => $value): ?>
                        <div class="mb-2">
                            <label class="form-label"><?= $label ?></label>
                            <input type="text" class="form-control" value="<?= $value ?>" readonly>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- 🛠️ Ferramentas Dev -->
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-bold">🛠️ Ferramentas de Desenvolvimento</div>
                <div class="card-body">
                    <?php
                    $ferramentas = [
                        'PHP'        => phpversion(),
                        'MySQL'      => $mysqlVersion,
                        'Composer'   => $composerVersion,
                        'Node.js'    => $nodeVersion,
                        'npm'        => $npmVersion,
                        'Git'        => $gitVersion,
                        'GitHub CLI' => $ghVersion,
                        'Xdebug'     => $xdebugVersion
                    ];
                    foreach ($ferramentas as $label => $valor): ?>
                        <div class="mb-2">
                            <label class="form-label"><?= $label ?></label>
                            <input type="text" class="form-control" value="<?= $valor ?>" readonly>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- 🔌 MODAL TESTE DE CONEXÃO -->
<div class="modal fade" id="modalConexao" tabindex="-1" aria-labelledby="modalConexaoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-transparent border-0">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">
                    <div class="card shadow-lg border-0">
                        <div class="card-header bg-primary text-white text-center">
                            <h4 class="mb-0" id="modalConexaoLabel">Status da Conexão</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control text-<?= str_contains($dbStatus, 'Falha') ? 'danger' : 'success' ?> fw-bold" value="<?= $dbStatus ?>" readonly>
                            </div>

                            <?php foreach ($dbDetails as $label => $valor): ?>
                                <div class="mb-2">
                                    <label class="form-label"><?= $label ?></label>
                                    <input type="text" class="form-control" value="<?= $valor ?>" readonly>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="card-footer text-center">
                            <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">
                                <i class="bi bi-x-circle me-1"></i> Fechar
                            </button>
                        </div>
                        <div class="card-footer text-center small text-muted">
                            &copy; PHP Full-Stack <?= date('Y') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
