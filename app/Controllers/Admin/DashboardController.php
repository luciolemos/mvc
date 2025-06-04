<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\FuncaoModel;
use App\Models\PessoalModel;
use App\Models\CategoriaModel;
use App\Models\EquipamentoModel;
use App\Models\ObraModel;

class DashboardController extends Controller {
    public function index() {
        $dados = [
            'total_funcoes'       => (new FuncaoModel())->contar(),
            'total_pessoal'       => (new PessoalModel())->contar(),
            'total_categoria_eqp' => (new CategoriaModel())->contar(),
            'total_equipamentos'  => (new EquipamentoModel())->contar(),
            'total_obras'         => (new ObraModel())->contar()
        ];

        $this->view('admin/dashboard', $dados, 'admin');
    }
}
