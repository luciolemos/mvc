<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\PessoalModel;
use App\Models\FuncaoModel;
use App\Models\ObraModel;

class PessoalController extends Controller {

    private PessoalModel $model;

    public function __construct() {
        $this->model = new PessoalModel();

        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'admin');
            exit;
        }
    }

    public function index(): void {
        $q = $_GET['q'] ?? '';
        $pessoal = $q
            ? $this->model->buscarPorNome($q)
            : $this->model->listar();

        $this->view('admin/pessoal/index', compact('pessoal', 'q'), 'admin');
    }

    public function cadastrar(): void {
        $obras   = (new ObraModel())->listarObrasSimples();
        $funcoes = (new FuncaoModel())->listar();

        $this->view('admin/pessoal/cadastrar', compact('obras', 'funcoes'), 'admin');
    }

    public function salvar(): void {
        $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
        if (strlen($cpf) !== 11) {
            $_SESSION['toast'] = ['type' => 'danger', 'message' => 'CPF inválido!'];
            header("Location: " . BASE_URL . "admin/pessoal/cadastrar");
            exit;
        }

        $dados = $this->coletarDados($_POST, $cpf);
        $this->model->salvar($dados);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Funcionário cadastrado com sucesso!'];
        header("Location: " . BASE_URL . "admin/pessoal");
        exit;
    }

    public function editar(int $id): void {
        $registro = $this->model->buscar($id);
        if (!$registro) {
            die("Funcionário não encontrado.");
        }

        $obras   = (new ObraModel())->listarObrasSimples();
        $funcoes = (new FuncaoModel())->listar();

        $this->view('admin/pessoal/editar', compact('registro', 'obras', 'funcoes'), 'admin');
    }

    public function atualizar(int $id): void {
        $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
        if (strlen($cpf) !== 11) {
            $_SESSION['toast'] = ['type' => 'danger', 'message' => 'CPF inválido!'];
            header("Location: " . BASE_URL . "admin/pessoal/editar/$id");
            exit;
        }

        $dados = $this->coletarDados($_POST, $cpf);
        $this->model->atualizar($id, $dados);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Funcionário atualizado com sucesso!'];
        header("Location: " . BASE_URL . "admin/pessoal");
        exit;
    }

    public function deletar(int $id): void {
        $this->model->deletar($id);

        $_SESSION['toast'] = ['type' => 'success', 'message' => 'Funcionário excluído com sucesso!'];
        header("Location: " . BASE_URL . "admin/pessoal");
        exit;
    }

    private function coletarDados(array $post, string $cpf): array {
        return [
            'staff_id'      => $post['staff_id'] ?? 'FUNC-' . date('YmdHis'),
            'nome'          => trim($post['nome'] ?? ''),
            'cpf'           => $cpf,
            'nascimento'    => trim($post['nascimento'] ?? '') ?: null,
            'telefone'      => preg_replace('/\D/', '', $post['telefone'] ?? ''),
            'foto'          => null,
            'funcao'        => $post['workRole'] ?? null,
            'obra_id'       => $post['obra_id'] ?? null,
            'data_admissao' => trim($post['data_admissao'] ?? ''),
            'status'        => $post['status'] ?? 'Ativo',
            'jornada'       => $post['jornada'] ?? null,
            'observacoes'   => trim($post['observacoes'] ?? '')
        ];
    }
}
