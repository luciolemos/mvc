<?php

namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        $viewPath = "../app/Views/$view.php";
        if (file_exists($viewPath)) {
            $GLOBALS['view'] = $view;
            extract($data);
            require_once '../app/Views/layouts/main.php';
        } else {
            echo "View '$view' não encontrada.";
        }
    }

    protected function model($model) {
        $modelClass = "\\App\\Models\\$model";
        return new $modelClass();
    }
}
