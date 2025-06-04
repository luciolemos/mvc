<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class PessoalModel {
    private $db;
    private string $table = 'pessoal';

    public function __construct() {
        $this->db = Database::connect();
    }

    public function listar(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY criado_em DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar(int $id): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function salvar(array $dados): bool {
        $sql = "INSERT INTO {$this->table} (
            staff_id, nome, cpf, nascimento, telefone, foto,
            funcao, obra_id, data_admissao, status, jornada, observacoes
        ) VALUES (
            :staff_id, :nome, :cpf, :nascimento, :telefone, :foto,
            :funcao, :obra_id, :data_admissao, :status, :jornada, :observacoes
        )";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':staff_id'      => $dados['staff_id'],
            ':nome'          => $dados['nome'],
            ':cpf'           => $dados['cpf'],
            ':nascimento'    => $dados['nascimento'],
            ':telefone'      => $dados['telefone'],
            ':foto'          => $dados['foto'],
            ':funcao'        => $dados['funcao'],
            ':obra_id'       => $dados['obra_id'],
            ':data_admissao' => $dados['data_admissao'],
            ':status'        => $dados['status'],
            ':jornada'       => $dados['jornada'],
            ':observacoes'   => $dados['observacoes']
        ]);
    }

    public function atualizar(int $id, array $dados): bool {
        $sql = "UPDATE {$this->table} SET
            nome = :nome,
            cpf = :cpf,
            nascimento = :nascimento,
            telefone = :telefone,
            foto = :foto,
            funcao = :funcao,
            obra_id = :obra_id,
            data_admissao = :data_admissao,
            status = :status,
            jornada = :jornada,
            observacoes = :observacoes
        WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nome'          => $dados['nome'],
            ':cpf'           => $dados['cpf'],
            ':nascimento'    => $dados['nascimento'],
            ':telefone'      => $dados['telefone'],
            ':foto'          => $dados['foto'],
            ':funcao'        => $dados['funcao'],
            ':obra_id'       => $dados['obra_id'],
            ':data_admissao' => $dados['data_admissao'],
            ':status'        => $dados['status'],
            ':jornada'       => $dados['jornada'],
            ':observacoes'   => $dados['observacoes'],
            ':id'            => $id
        ]);
    }

    public function deletar(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscarPorNome(string $termo): array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE nome LIKE :termo ORDER BY criado_em DESC");
        $stmt->execute([':termo' => "%{$termo}%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar(): int {
        $stmt = $this->db->query("SELECT COUNT(*) AS total FROM {$this->table}");
        return (int) $stmt->fetch(\PDO::FETCH_ASSOC)['total'];
    }
}
