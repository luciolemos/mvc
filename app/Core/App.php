<?php

namespace App\Core;

use App\Core\Router;

class App {
    protected $controller;
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = Router::parseUrl();
        $mainRoute = $url[0] ?? 'home';

        // 🔐 Rota para ADMIN (Dashboard, Posts, Docs, etc.)
        if ($mainRoute === 'admin') {
            $controllerName = ucfirst($url[1] ?? 'Dashboard') . 'Controller';
            $controllerPath = "\\App\\Controllers\\Admin\\$controllerName";
            $this->method = $url[2] ?? 'index';
            $this->params = array_slice($url, 3);
        }

        // 🌐 Rota para SITE público (Home, Blog, Contact, etc.)
        else {
            $controllerName = ucfirst($mainRoute) . 'Controller';
            $controllerPath = "\\App\\Controllers\\Site\\$controllerName";
            $this->method = $url[1] ?? 'index';
            $this->params = array_slice($url, 2);
        }

        // ⚙️ Instancia o controller se existir
        if (class_exists($controllerPath)) {
            $this->controller = new $controllerPath();
        } else {
            return $this->notFound("Controller '$controllerPath' não encontrado.");
        }

        // ⚠️ Verifica se o método existe
        if (!method_exists($this->controller, $this->method)) {
            return $this->notFound("Método '{$this->method}' não encontrado em $controllerName.");
        }

        // 🚀 Executa a ação
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function notFound($msg = 'Página não encontrada') {
        http_response_code(404);
        die("❌ 404 - $msg");
    }
}
