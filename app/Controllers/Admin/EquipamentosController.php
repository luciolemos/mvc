<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\EquipamentoModel;
use App\Models\CategoriaModel;

class EquipamentosController extends Controller {

    private EquipamentoModel $model;

    public function __construct() {
        $this->model = new EquipamentoModel();

        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function index(): void {
        $q = $_GET['q'] ?? '';
        $equipamentos = $q
            ? $this->model->buscarPorNome($q)
            : $this->model->listar();

        $this->view('admin/equipamentos/index', compact('equipamentos', 'q'), 'admin');
    }

    public function cadastrar(): void {
        $categorias = (new CategoriaModel())->listar();
        $this->view('admin/equipamentos/cadastrar', compact('categorias'), 'admin');
    }

    public function salvar(): void {
        $dados = [
            'staff_id'           => $_POST['staff_id'] ?? 'EQP-' . date('YmdHis'),
            'nome'               => trim($_POST['nome'] ?? ''),
            'codigo'             => trim($_POST['codigo'] ?? ''),
            'serial_number'      => trim($_POST['serial_number'] ?? ''),
            'marca'              => trim($_POST['marca'] ?? ''),
            'modelo'             => trim($_POST['modelo'] ?? ''),
            'data_fabricacao'    => $_POST['data_fabricacao'] ?? null,
            'estado'             => trim($_POST['estado'] ?? ''),
            'quantidade_estoque' => (int) ($_POST['quantidade_estoque'] ?? 0),
            'categoria_id'       => (int) ($_POST['categoria_id'] ?? null)
        ];

        $this->model->salvar($dados);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Equipamento cadastrado com sucesso!'];
        header('Location: ' . BASE_URL . 'admin/equipamentos');
        exit;
    }

    public function editar(int $id): void {
        $registro = $this->model->buscar($id);
        $categorias = (new CategoriaModel())->listar();
        $this->view('admin/equipamentos/editar', compact('registro', 'categorias'), 'admin');
    }

    public function atualizar(int $id): void {
        $this->model->atualizar($id, $_POST);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Equipamento atualizado!'];
        header('Location: ' . BASE_URL . 'admin/equipamentos');
        exit;
    }

    public function deletar(int $id): void {
        $this->model->deletar($id);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Equipamento removido.'];
        header('Location: ' . BASE_URL . 'admin/equipamentos');
        exit;
    }
}
