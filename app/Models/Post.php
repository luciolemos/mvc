<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class Post extends Database {
    protected string $table = 'posts';

    public function todos(): array {
        return $this->all($this->table);
    }

    public function encontrarPorId(int $id): ?array {
        return $this->find($this->table, $id);
    }

    public function encontrarPorSlug(string $slug): ?array {
        $stmt = $this->connect()->prepare("SELECT * FROM {$this->table} WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function criar(array $data): bool {
        return $this->insert($this->table, $data);
    }

    public function atualizar(int $id, array $data): bool {
        return $this->update($this->table, $id, $data);
    }

    public function excluir(int $id): bool {
        return $this->delete($this->table, $id);
    }

    public function buscarPorTitulo(string $termo): array {
        $stmt = $this->connect()->prepare("SELECT * FROM {$this->table} WHERE titulo LIKE :termo ORDER BY criado_em DESC");
        $stmt->execute([':termo' => '%' . $termo . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
