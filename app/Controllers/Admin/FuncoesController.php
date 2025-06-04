<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\FuncaoModel;

class FuncoesController extends Controller {
    private FuncaoModel $model;

    public function __construct() {
        $this->model = new FuncaoModel();

        if (!isset($_SESSION['user'])) {
            header("Location: " . BASE_URL . "admin");
            exit;
        }
    }

    public function index(): void {
        $q = $_GET['q'] ?? '';
        $funcoes = $q
            ? $this->model->buscarPorNome($q)
            : $this->model->listar();

        $this->view('admin/funcoes/index', compact('funcoes', 'q'), 'admin');
    }

    public function cadastrar(): void {
        $this->view('admin/funcoes/cadastrar', [], 'admin');
    }

    public function salvar(): void {
        $dados = [
            'staff_id' => $_POST['staff_id'] ?? 'FUNC-' . date('YmdHis'),
            'nome'     => trim($_POST['nome'] ?? '')
        ];

        $this->model->salvar($dados);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Função cadastrada com sucesso!'];
        header("Location: " . BASE_URL . "admin/funcoes");
        exit;
    }

    public function editar(int $id): void {
        $registro = $this->model->buscar($id);
        $this->view('admin/funcoes/editar', compact('registro'), 'admin');
    }

    public function atualizar(int $id): void {
        $this->model->atualizar($id, [
            'nome' => trim($_POST['nome'] ?? '')
        ]);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Função atualizada com sucesso!'];
        header("Location: " . BASE_URL . "admin/funcoes");
        exit;
    }

    public function deletar(int $id): void {
        $this->model->deletar($id);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Função excluída.'];
        header("Location: " . BASE_URL . "admin/funcoes");
        exit;
    }
}
