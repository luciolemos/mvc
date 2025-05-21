<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class DashboardController extends Controller {
    public function index() {
        // 👉 Força a view a ser renderizada com layout 'admin.php'
        $this->view('admin/dashboard', [], 'admin');
    }
}
