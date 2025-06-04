<?php

namespace App\Core;

class App {
    protected $controller;
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = Router::parseUrl();

        $this->resolveController($url);
        $this->execute();
    }

    private function resolveController(array $url): void {
        $mainRoute = $url[0] ?? 'home';

        if ($mainRoute === 'admin') {
            array_shift($url); // remove 'admin'

            $controllerPart = array_shift($url) ?? 'dashboard';
            $this->method = $this->sanitizeMethod(array_shift($url) ?? 'index');
            $this->params = array_map('htmlspecialchars', $url);

            $controllerClass = $this->buildControllerClass($controllerPart, 'Admin');
        } else {
            $controllerPart = $mainRoute;
            $this->method = $this->sanitizeMethod($url[1] ?? 'index');
            $this->params = array_slice($url, 2);

            $controllerClass = "\\App\\Controllers\\Site\\" . ucfirst($controllerPart) . "Controller";
        }

        if (!class_exists($controllerClass)) {
            $this->notFound("Controller não encontrado: $controllerClass");
        }

        $this->controller = new $controllerClass();

        if (!method_exists($this->controller, $this->method)) {
            $this->notFound("Método '{$this->method}' não encontrado em $controllerClass");
        }
    }

    private function buildControllerClass(string $path, string $area): string {
        $segments = explode('/', $path);
        $controller = ucfirst(array_pop($segments)) . 'Controller';
        $namespace = implode('\\', array_map('ucfirst', $segments));

        return "\\App\\Controllers\\{$area}" . ($namespace ? "\\{$namespace}" : '') . "\\{$controller}";
    }

    private function sanitizeMethod(string $method): string {
        return preg_replace('/[^a-zA-Z0-9_]/', '', $method);
    }

    private function execute(): void {
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    private function notFound(string $message): void {
        http_response_code(404);
        die("❌ 404 - $message");
    }
}
