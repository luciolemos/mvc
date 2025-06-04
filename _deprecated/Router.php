<?php

namespace App\Core;

class Router {
    public static function parseUrl(): array {
        $url = $_GET['url'] ?? '';
        $url = trim($url, '/');

        // Sanitize path (remove ../, //, etc.)
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Normalize double slashes and empty
        $segments = array_filter(explode('/', $url), fn($segment) => $segment !== '');

        return $segments ?: ['home'];
    }
}
