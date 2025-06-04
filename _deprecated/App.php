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

        if ($mainRoute === 'admin') {
            // Remove 'admin' da URL
            array_shift($url);

            // Extrai partes do caminho
            $parts = $url;
            $controllerPart = array_shift($parts) ?? 'dashboard';
            $method = array_shift($parts) ?? 'index';
            $params = $parts;

            // Lógica para subdiretórios
            $controllerSegments = explode('/', $controllerPart);
            $controllerName = ucfirst(array_pop($controllerSegments)) . 'Controller';
            $namespace = implode('\\', array_map('ucfirst', $controllerSegments));

            $fullNamespace = $namespace ? "\\App\\Controllers\\Admin\\$namespace" : "\\App\\Controllers\\Admin";
            $controllerPath = "$fullNamespace\\$controllerName";
        } else {
            // Site público
            $controllerName = ucfirst($mainRoute) . 'Controller';
            $controllerPath = "\\App\\Controllers\\Site\\$controllerName";
            $method = $url[1] ?? 'index';
            $params = array_slice($url, 2);
        }

        // 🚦 Controller check
        if (class_exists($controllerPath)) {
            $this->controller = new $controllerPath();
        } else {
            return $this->notFound("Controller '$controllerPath' não encontrado.");
        }

        // 🚦 Method check
        if (!method_exists($this->controller, $method)) {
            return $this->notFound("Método '$method' não encontrado em $controllerPath.");
        }

        $this->method = $method;
        $this->params = $params;

        // ✅ Execute
        call_user_func_array([$this->controller, $this->method], $this->params);
    }



    private function notFound($msg = 'Página não encontrada') {
        http_response_code(404);
        die("❌ 404 - $msg");
    }
}
