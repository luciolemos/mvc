<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Post;

class PostAdminController extends Controller {

    private $post;

    public function __construct() {
        $this->post = new Post();

        // 🔐 Proteção por login
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function index() {
        $termo = $_GET['q'] ?? null;

        if ($termo) {
            $posts = $this->post->buscarPorTitulo($termo);
        } else {
            $posts = $this->post->todos();
        }

        $this->view('admin/posts/index', compact('posts'));
    }

    public function create() {
        $this->view('admin/posts/create');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo   = $_POST['titulo'] ?? '';
            $slug     = $_POST['slug'] ?? '';
            $conteudo = $_POST['conteudo'] ?? '';
            $autor    = $_SESSION['user'] ?? 'admin';

            $this->post->criar($titulo, $slug, $conteudo, $autor);

            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => '🎉 Post criado com sucesso!'
            ];

            header('Location: ' . BASE_URL . 'admin/posts');
            exit;
        }
    }

    public function edit($id) {
        $post = $this->post->encontrarPorId($id);
        $this->view('admin/posts/edit', compact('post'));
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titulo   = $_POST['titulo'] ?? '';
            $slug     = $_POST['slug'] ?? '';
            $conteudo = $_POST['conteudo'] ?? '';

            $this->post->atualizar($id, $titulo, $slug, $conteudo);

            $_SESSION['toast'] = [
                'type' => 'success',
                'message' => '✅ Post atualizado com sucesso!'
            ];

            header('Location: ' . BASE_URL . 'admin/posts');
            exit;
        }
    }

    public function delete($id) {
        $this->post->excluir($id);

        $_SESSION['toast'] = [
            'type' => 'success',
            'message' => '🗑️ Post excluído com sucesso!'
        ];

        header('Location: ' . BASE_URL . 'admin/posts');
        exit;
    }
}
