<?php

namespace App;

use Exception;
use PDO;
use PDOException;

class Connection
{

    private PDO $db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        try {
            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=' . $_ENV['DB_CHARSET'];
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ];
            $this->db = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $options);
        } catch (PDOException $e) {
            throw new Exception('Database connection error: ' . $e->getMessage());
        }
    }

    public function getDb(): PDO
    {
        return $this->db;
    }
}