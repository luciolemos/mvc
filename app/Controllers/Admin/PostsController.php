<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Post;

class PostsController extends Controller {

    private Post $post;

    public function __construct() {
        $this->post = new Post();

        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function index(): void {
        $q = $_GET['q'] ?? '';
        $posts = $q
            ? $this->post->buscarPorTitulo($q)
            : $this->post->todos();

        $this->view('admin/posts/index', compact('posts', 'q'), 'admin');
    }

    public function create(): void {
        $this->view('admin/posts/create', [], 'admin');
    }

    public function store(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $_SESSION['toast'] = ['type' => 'danger', 'message' => '⚠️ Método inválido para criar post!'];
            header('Location: ' . BASE_URL . 'admin/posts/create');
            exit;
        }

        $this->post->criar([
            'titulo'   => $_POST['titulo'] ?? '',
            'slug'     => $_POST['slug'] ?? '',
            'conteudo' => $_POST['conteudo'] ?? '',
            'autor'    => $_SESSION['user'] ?? 'admin',
        ]);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Post criado com sucesso!'];

        $action = $_POST['action'] ?? 'save_exit';
        $redirect = $action === 'save_continue'
            ? BASE_URL . 'admin/posts/create'
            : BASE_URL . 'admin/posts';

        header('Location: ' . $redirect);
        exit;
    }

    public function edit(int $id): void {
        $post = $this->post->encontrarPorId($id);
        $this->view('admin/posts/edit', compact('post'), 'admin');
    }

    public function update(int $id): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->post->atualizar($id, [
                'titulo'   => $_POST['titulo'] ?? '',
                'slug'     => $_POST['slug'] ?? '',
                'conteudo' => $_POST['conteudo'] ?? '',
            ]);

            $_SESSION['toast'] = ['type' => 'success', 'message' => 'Post atualizado com sucesso!'];
            header('Location: ' . BASE_URL . 'admin/posts');
            exit;
        }
    }

    public function delete(int $id): void {
        $this->post->excluir($id);
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Post excluído com sucesso!'];
        header('Location: ' . BASE_URL . 'admin/posts');
        exit;
    }
}
