<?php


namespace App\Helpers;

class RouteHelper {
    public static function currentSegments(): array {
        $current = $_GET['url'] ?? 'admin/dashboard';
        $segments = explode('/', $current);
        return [
            'mainRoute' => $segments[0] ?? '',
            'midRoute'  => $segments[1] ?? '',
            'subRoute'  => $segments[2] ?? $segments[1] ?? ''
        ];
    }
}

