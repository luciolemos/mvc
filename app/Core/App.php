<?php

namespace App\Core;

use App\Core\Router;

/**
* Esse é o núcleo do seu sistema de rotas dinâmico!
* Com base nesse App.php, você não precisa usar $router->post(...) em lugar nenhum! Seu roteador é dinâmico.
* O que define a rota? Nome do controller e nome do método
*/

class App {
    protected $controller = 'HomeController';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $url = Router::parseUrl();

        $controllerName = ucfirst($url[0] ?? 'home') . 'Controller';
        $controllerPath = "\\App\\Controllers\\$controllerName";

        if (class_exists($controllerPath)) {
            $this->controller = new $controllerPath();
            unset($url[0]);
        } else {
            http_response_code(404);
            echo "404 - Página não encontrada.";
            exit;
        }

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
