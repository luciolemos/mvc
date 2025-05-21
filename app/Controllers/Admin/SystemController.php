<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Helpers\SystemVersions;

class SystemController extends Controller
{
    public function versions()
    {
        $versions = SystemVersions::get();
        $this->view('admin/system/versions', compact('versions'), 'admin');
    }

    public function info()
    {
        $info = [
            'SO'         => php_uname(),
            'PHP Path'   => PHP_BINARY,
            'Root Path'  => $_SERVER['DOCUMENT_ROOT'],
            'Timezone'   => date_default_timezone_get(),
            'Memory'     => ini_get('memory_limit'),
        ];

        $this->view('admin/system/info', compact('info'), 'admin');
    }
}
