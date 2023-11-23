<?php

class Database
{
    private $conn;
    private static $instance = null;
    private function __construct()
    {
        try {
            $dsn = "mysql:host=" . DB_HOSTNAME . ':' . DB_PORT . ";dbname=" . DB_NAME;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->conn = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            Helper::debug($e->getMessage());
        }
    }


    /**
     * getInstance
     *
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /**
     * Returns database connection object
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->conn;
    }
}
