<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database {
    private static $instance;
    protected $pdo;

    public function __construct() {
        $this->pdo = self::connect();
    }

    public static function connect(): PDO {
        if (!self::$instance) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->safeLoad(); // safeLoad para evitar conflito em CLI

            $host = $_ENV['DB_HOST'];
            $dbname = $_ENV['DB_NAME'];
            $user = $_ENV['DB_USER'];
            $pass = $_ENV['DB_PASS'];

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            try {
                self::$instance = new PDO($dsn, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Erro de conexão com o banco de dados: ' . $e->getMessage());
            }
        }

        return self::$instance;
    }

    // 🔁 Reutilizáveis CRUD

    public function all(string $table): array {
        $stmt = $this->pdo->query("SELECT * FROM $table");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(string $table, int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $data): bool {
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn($k) => ":$k", array_keys($data)));
        $stmt = $this->pdo->prepare("INSERT INTO $table ($columns) VALUES ($placeholders)");
        return $stmt->execute($data);
    }

    public function update(string $table, int $id, array $data): bool {
        $fields = implode(', ', array_map(fn($k) => "$k = :$k", array_keys($data)));
        $data['id'] = $id;
        $stmt = $this->pdo->prepare("UPDATE $table SET $fields WHERE id = :id");
        return $stmt->execute($data);
    }

    public function delete(string $table, int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function search(string $table, string $column, string $term): array {
        $stmt = $this->pdo->prepare("SELECT * FROM $table WHERE $column LIKE ?");
        $stmt->execute(["%$term%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
