<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class CategoriaModel {
    private PDO $db;
    private string $table = 'categorias_equipamentos';

    public function __construct() {
        $this->db = Database::connect();
    }

    public function listar(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY nome ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function salvar(array $dados): bool {
        $sql = "INSERT INTO {$this->table} (staff_id, nome) VALUES (:staff_id, :nome)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':staff_id' => $dados['staff_id'],
            ':nome'     => $dados['nome']
        ]);
    }

    public function atualizar(int $id, array $dados): bool {
        $sql = "UPDATE {$this->table} SET nome = :nome WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome' => $dados['nome'],
            ':id'   => $id
        ]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscarPorNome(string $termo): array {
        $sql = "SELECT * FROM {$this->table} WHERE nome LIKE :termo ORDER BY nome ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':termo' => "%$termo%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar(): int {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM {$this->table}");
        return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
