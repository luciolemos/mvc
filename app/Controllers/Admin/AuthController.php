<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class AuthController extends Controller {

    public function index() {
        if (!isset($_SESSION['user'])) {
            $this->view('admin/login', [], 'auth'); // <<-- renderiza com o layout auth.php
        } else {
            header('Location: ' . BASE_URL . 'admin/dashboard');
            exit;
        }
    }


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['username'] ?? '';
            $pass = $_POST['password'] ?? '';

            if ($user === 'admin' && $pass === '1234') {
                $_SESSION['user'] = $user;
                header('Location: ' . BASE_URL . 'admin/dashboard');
                exit;
            } else {
                $error = 'Usuário ou senha inválidos.';
                $this->view('admin/login', compact('error'));
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . 'admin/auth');

        exit;
    }

}
