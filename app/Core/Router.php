<?php

namespace App\Core;

class Router {
    /**
     * Faz o parsing da URL vinda via .htaccess
     * Ex: /admin/posts/edit/3 → ['admin', 'posts', 'edit', '3']
     */
    public static function parseUrl(): array {
        $rawUrl = $_GET['url'] ?? '';
        $cleanUrl = self::sanitizeUrl($rawUrl);

        // Explode em segmentos
        $segments = array_filter(explode('/', $cleanUrl), fn($s) => $s !== '');

        return $segments ?: ['home'];
    }

    /**
     * Sanitiza a URL bruta
     */
    private static function sanitizeUrl(string $url): string {
        // Remove espaços, barras redundantes, e ataques básicos
        $url = trim($url);
        $url = preg_replace('/[^\w\-\/]/u', '', $url); // apenas letras, números, -, _
        $url = preg_replace('/\/+/', '/', $url); // remove barras duplicadas
        $url = trim($url, '/'); // remove barra final

        return filter_var($url, FILTER_SANITIZE_URL);
    }
}
