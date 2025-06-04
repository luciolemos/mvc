<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class DocsController extends Controller
{
    public function estrutura() {
        $this->view('admin/documents/estrutura', [], 'admin');
    }

    public function virtualhost() {
        $this->view('admin/documents/virtualhost', [], 'admin');
    }

    public function composer() {
        $this->view('admin/documents/composer', [], 'admin');
    }

    public function diagrama() {
        $this->view('admin/documents/diagrama', [], 'admin');
    }

    public function caracteristicas() {
        $this->view('admin/documents/caracteristicas', [], 'admin');
    }

    public function fluxomvc() {
        $this->view('admin/documents/fluxomvc', [], 'admin');
    }

    public function fluxopost() {
        $this->view('admin/documents/fluxopost', [], 'admin');
    }

    public function novofluxomvc() {
        $this->view('admin/documents/novofluxomvc', [], 'admin');
    }

    public function blog() {
        $this->view('admin/documents/blog', [], 'admin');
    }

    public function elements() {
        $this->view('admin/documents/elements', [], 'admin');
    }

    public function scripts() {
        $this->view('admin/documents/scriptssql', [], 'admin');
    }

    public function index() {
        // Redireciona para uma das páginas documentadas, ou mostra uma visão geral
        $this->view('admin/documents/index', [], 'admin'); // Crie essa view
    }

}
