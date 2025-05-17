<?php

// app/Models/Post.php
namespace App\Models;

use App\Core\Database;

class Post {
    protected $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function todos() {
        $stmt = $this->db->query("SELECT*FROM posts ORDER BY criado_em DESC");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function encontrarPorSlug($slug) {
        $stmt = $this->db->prepare("SELECT*FROM posts WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
