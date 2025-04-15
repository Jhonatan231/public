<?php
require_once '../config/database.php'; // Asegúrate de la ruta correcta

class Distribucion {
    // Propiedades
    private $id;
    private $pedido_id; // Cambiado
    private $fecha_envio; // Cambiado
    private $estado;

    // Constructor
    public function __construct($id, $pedido_id, $fecha_envio, $estado) {
        $this->id = $id;
        $this->pedido_id = $pedido_id; // Cambiado
        $this->fecha_envio = $fecha_envio; // Cambiado
        $this->estado = $estado;
    }

    // Métodos Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getPedidoId() {
        return $this->pedido_id; // Cambiado
    }

    public function getFechaEnvio() {
        return $this->fecha_envio; // Cambiado
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setPedidoId($pedido_id) { // Cambiado
        $this->pedido_id = $pedido_id; // Cambiado
    }

    public function setFechaEnvio($fecha_envio) { // Cambiado
        $this->fecha_envio = $fecha_envio; // Cambiado
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    // Métodos CRUD
    public function save() {
        try {
            $database = new Database();
            $db = $database->getConnection();
            $stmt = $db->prepare("INSERT INTO distribucion (pedido_id, fecha_envio, estado) VALUES (?, ?, ?)"); // Cambiado
            $stmt->bindValue(1, $this->pedido_id); // Cambiado
            $stmt->bindValue(2, $this->fecha_envio); // Cambiado
            $stmt->bindValue(3, $this->estado);
            return $stmt->execute();
        } catch (PDOException $e) {
            return false; // Manejo de error
        }
    }

    public static function find($id) {
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare("SELECT * FROM distribucion WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new self($data['id'], $data['pedido_id'], $data['fecha_envio'], $data['estado']); // Cambiado
        }
        return null;
    }

    public static function all() {
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->query("SELECT * FROM distribucion");
        $distribuciones = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $distribuciones[] = new self($data['id'], $data['pedido_id'], $data['fecha_envio'], $data['estado']); // Cambiado
        }
        return $distribuciones;
    }

    public function update() {
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare("UPDATE distribucion SET pedido_id = ?, fecha_envio = ?, estado = ? WHERE id = ?"); // Cambiado
        $stmt->bindValue(1, $this->pedido_id); // Cambiado
        $stmt->bindValue(2, $this->fecha_envio); // Cambiado
        $stmt->bindValue(3, $this->estado);
        $stmt->bindValue(4, $this->id);
        return $stmt->execute();
    }

    public function delete() {
        $database = new Database();
        $db = $database->getConnection();
        $stmt = $db->prepare("DELETE FROM distribucion WHERE id = ?");
        $stmt->bindValue(1, $this->id);
        return $stmt->execute();
    }
}
?>