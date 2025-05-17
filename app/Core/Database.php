<?php

namespace App\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database {
    private static $instance;

    public static function connect(): PDO {
        if (!self::$instance) {
            $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
            $dotenv->load();

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
}
