<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\CategoriaModel;

class CategoriasController extends Controller {
    private CategoriaModel $model;

    public function __construct() {
        $this->model = new CategoriaModel();

        // Proteção de rota
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function index(): void {
        $termo = $_GET['q'] ?? '';
        $categorias = $termo
            ? $this->model->buscarPorNome($termo)
            : $this->model->listar();

        $this->view('admin/categorias/index', [
            'categorias' => $categorias,
            'q' => $termo
        ], 'admin');
    }

    public function cadastrar(): void {
        $this->view('admin/categorias/cadastrar', [], 'admin');
    }

    public function salvar(): void {
        $dados = [
            'staff_id' => $_POST['staff_id'] ?? 'CAT-' . date('YmdHis'),
            'nome'     => trim($_POST['nome'] ?? '')
        ];

        $this->model->salvar($dados);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Categoria cadastrada com sucesso!'];
        header("Location: " . BASE_URL . "admin/categorias");
        exit;
    }

    public function editar(int $id): void {
        $registro = $this->model->buscar($id);

        if (!$registro) {
            $_SESSION['toast'] = ['type' => 'danger', 'message' => 'Categoria não encontrada.'];
            header("Location: " . BASE_URL . "admin/categorias");
            exit;
        }

        $this->view('admin/categorias/editar', compact('registro'), 'admin');
    }

    public function atualizar(int $id): void {
        $dados = [
            'nome' => trim($_POST['nome'] ?? '')
        ];

        $this->model->atualizar($id, $dados);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Categoria atualizada com sucesso!'];
        header("Location: " . BASE_URL . "admin/categorias");
        exit;
    }

    public function deletar(int $id): void {
        $this->model->deletar($id);
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Categoria removida com sucesso!'];
        header("Location: " . BASE_URL . "admin/categorias");
        exit;
    }
}
