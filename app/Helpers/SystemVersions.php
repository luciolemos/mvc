<?php

namespace App\Helpers;

class SystemVersions
{
    public static function get(): array
    {
        return [
            'php'      => phpversion(),
            'mysql'    => (new \mysqli(DB_HOST, DB_USER, DB_PASS))->server_info ?? '—',
            'composer' => trim(shell_exec('composer --version 2>/dev/null')) ?: '—',
            'node'     => trim(shell_exec('node -v 2>/dev/null')) ?: '—',
            'npm'      => trim(shell_exec('npm -v 2>/dev/null')) ?: '—',
        ];
    }
}
