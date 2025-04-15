<?php
// config/database.php

class Database {
    private $host = 'localhost'; // Cambia esto si tu base de datos está en otro servidor
    private $db_name = 'textil_smart';
    private $username = 'root'; // Cambia esto por tu usuario de base de datos
    private $password = ''; // Cambia esto por tu contraseña de base de datos
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
            exit; // Termina la ejecución si hay un error
        }

        return $this->conn;
    }
}
?>