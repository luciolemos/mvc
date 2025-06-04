<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\ObraModel;

class ObrasController extends Controller {
    private ObraModel $model;

    public function __construct() {
        $this->model = new ObraModel();

        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function index(): void {
        $q = $_GET['q'] ?? '';
        $obras = $q
            ? $this->model->buscarPorDescricao($q)
            : $this->model->listar();

        $this->view('admin/obras/index', compact('obras', 'q'), 'admin');
    }

    public function cadastrar(): void {
        $this->view('admin/obras/cadastrar', [], 'admin');
    }

    public function salvar(): void {
        $dados = $_POST;
        $dados['valor_estimado'] = str_replace(',', '.', $dados['valor_estimado'] ?? 0.0);

        $this->model->salvar($dados);
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Obra cadastrada com sucesso!'];
        header('Location: ' . BASE_URL . 'admin/obras');
        exit;
    }

    public function editar(int $id): void {
        $obra = $this->model->buscar($id);
        if (!$obra) die("Obra não encontrada.");

        $this->view('admin/obras/editar', compact('obra'), 'admin');
    }

    public function atualizar(int $id): void {
        $dados = $_POST;
        $dados['valor_estimado'] = str_replace(',', '.', $dados['valor_estimado'] ?? 0.0);

        $this->model->atualizar($id, $dados);
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Obra atualizada com sucesso!'];
        header('Location: ' . BASE_URL . 'admin/obras');
        exit;
    }

    public function deletar(int $id): void {
        $this->model->deletar($id);
        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Obra removida com sucesso!'];
        header('Location: ' . BASE_URL . 'admin/obras');
        exit;
    }
}
