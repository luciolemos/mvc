<?php

namespace App\Controllers;

use App\Core\Controller;

class ReadmeController extends Controller {
    public function index() {
        $this->view('readme');
    }
}
