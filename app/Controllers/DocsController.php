<?php

namespace App\Controllers;

use App\Core\Controller;

class DocsController extends Controller
{
    public function estrutura() {
        $this->view('docs/estrutura');
    }

    public function virtualhost() {
        $this->view('docs/virtualhost');
    }

    public function composer() {
        $this->view('docs/composer');
    }

    public function diagrama() {
        $this->view('docs/diagrama');
    }

    public function caracteristicas() {
        $this->view('docs/caracteristicas');
    }

    public function fluxomvc() {
        $this->view('docs/fluxomvc');
    }

    public function fluxopost() {
        $this->view('docs/fluxopost');
    }

    public function novofluxomvc() {
        $this->view('docs/novofluxomvc');
    }
}
