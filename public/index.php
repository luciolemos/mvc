<?php

// Ativa relatório de erros em ambiente de desenvolvimento
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Autoload Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Carrega configurações e variáveis de ambiente
$config = require_once __DIR__ . '/../config/config.php';

// Inicia sessão
session_start();

// Middleware de timeout opcional
if (isset($_SESSION['last_activity'])) {
    $timeout = $config['app']['session_timeout'] ?? 600;
    if (time() - $_SESSION['last_activity'] > $timeout) {
        session_unset();
        session_destroy();
    }
}
$_SESSION['last_activity'] = time();

// Captura exceções globais não tratadas
set_exception_handler(function ($e) {
    http_response_code(500);
    error_log($e->getMessage());
    die('❌ Erro fatal: ' . (getenv('APP_ENV') === 'dev' ? $e->getMessage() : 'Erro interno no servidor.'));
});

// Dispara o app
use App\Core\App;
$app = new App();
