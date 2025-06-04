<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class EquipamentoModel {

    private $db;
    private string $table = 'equipamentos';

    public function __construct() {
        $this->db = Database::connect();
    }

    public function listar(): array {
        $sql = "SELECT e.*, c.nome AS categoria_nome
                FROM {$this->table} e
                LEFT JOIN categorias_equipamentos c ON e.categoria_id = c.id
                ORDER BY e.criado_em DESC";
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function salvar(array $dados): bool {
        $sql = "INSERT INTO {$this->table} (
            staff_id, nome, codigo, serial_number, marca, modelo,
            data_fabricacao, estado, quantidade_estoque, categoria_id
        ) VALUES (
            :staff_id, :nome, :codigo, :serial_number, :marca, :modelo,
            :data_fabricacao, :estado, :quantidade_estoque, :categoria_id
        )";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':staff_id'           => $dados['staff_id'],
            ':nome'               => $dados['nome'],
            ':codigo'             => $dados['codigo'],
            ':serial_number'      => $dados['serial_number'],
            ':marca'              => $dados['marca'],
            ':modelo'             => $dados['modelo'],
            ':data_fabricacao'    => $dados['data_fabricacao'],
            ':estado'             => $dados['estado'],
            ':quantidade_estoque' => $dados['quantidade_estoque'],
            ':categoria_id'       => $dados['categoria_id']
        ]);
    }

    public function atualizar(int $id, array $dados): bool {
        $sql = "UPDATE {$this->table} SET
            nome = :nome,
            codigo = :codigo,
            serial_number = :serial_number,
            marca = :marca,
            modelo = :modelo,
            data_fabricacao = :data_fabricacao,
            estado = :estado,
            quantidade_estoque = :quantidade_estoque,
            categoria_id = :categoria_id
            WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'               => $dados['nome'],
            ':codigo'             => $dados['codigo'],
            ':serial_number'      => $dados['serial_number'],
            ':marca'              => $dados['marca'],
            ':modelo'             => $dados['modelo'],
            ':data_fabricacao'    => $dados['data_fabricacao'],
            ':estado'             => $dados['estado'],
            ':quantidade_estoque' => $dados['quantidade_estoque'],
            ':categoria_id'       => $dados['categoria_id'],
            ':id'                 => $id
        ]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscarPorNome(string $termo): array {
        $sql = "SELECT e.*, c.nome AS categoria_nome
                FROM {$this->table} e
                LEFT JOIN categorias_equipamentos c ON e.categoria_id = c.id
                WHERE e.nome LIKE :termo
                ORDER BY e.criado_em DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':termo' => '%' . $termo . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar(): int {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM {$this->table}");
        return (int) $stmt->fetch(\PDO::FETCH_ASSOC)['total'];
    }

}
