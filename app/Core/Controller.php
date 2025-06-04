<?php

namespace App\Core;

class Controller {
    protected function view($view, $data = [], $layout = 'main') {
        $viewPath = "../app/Views/{$view}.php";
        if (file_exists($viewPath)) {
            $GLOBALS['view'] = $view;
            extract($data);

            // Renderiza layout correto
            require_once "../app/Views/layouts/{$layout}.php";
        } else {
            http_response_code(500);
            die("❌ View '$view' não encontrada em {$viewPath}");

        }
    }

    protected function model($model) {
        $modelClass = "\\App\\Models\\$model";
        return new $modelClass();
    }
}
