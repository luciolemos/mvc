<?php

// app/Models/Post.php
namespace App\Models;

use App\Core\Database;

class Post {
    protected $db;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) session_start();

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

    public function encontrarPorId($id) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function criar($titulo, $slug, $conteudo, $autor) {
        $stmt = $this->db->prepare("INSERT INTO posts (titulo, slug, conteudo, autor) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo, $slug, $conteudo, $autor]);
    }

    public function atualizar($id, $titulo, $slug, $conteudo) {
        $stmt = $this->db->prepare("UPDATE posts SET titulo = ?, slug = ?, conteudo = ? WHERE id = ?");
        $stmt->execute([$titulo, $slug, $conteudo, $id]);
    }

    public function excluir($id) {
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->execute([$id]);
    }

    public function buscarPorTitulo($termo) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE titulo LIKE ? ORDER BY criado_em DESC");
        $stmt->execute(['%' . $termo . '%']);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


}
