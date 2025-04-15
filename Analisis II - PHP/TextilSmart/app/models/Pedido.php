<?php
require_once '../config/database.php'; // Asegúrate de la ruta correcta

class Pedido {
    // Propiedades
    private $id;
    private $cliente_id;
    private $fecha;
    private $estado;
    private $total;

    // Constructor
    public function __construct($id = null, $cliente_id, $fecha, $estado, $total) {
        $this->id = $id;
        $this->cliente_id = $cliente_id;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->total = $total;
    }

    // Métodos Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getClienteId() {
        return $this->cliente_id;
    }

    public function setClienteId($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    // Métodos CRUD

    // Crear un nuevo pedido
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("INSERT INTO pedidos (cliente_id, fecha, estado, total) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->cliente_id, $this->fecha, $this->estado, $this->total]);
    }

    // Leer un pedido por ID
    public static function find($id) {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("SELECT * FROM pedidos WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new self($data['id'], $data['cliente_id'], $data['fecha'], $data['estado'], $data['total']) : null;
    }

    // Leer todos los pedidos
    public static function all() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->query("SELECT * FROM pedidos");
        $pedidos = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $pedidos[] = new self($data['id'], $data['cliente_id'], $data['fecha'], $data['estado'], $data['total']);
        }
        return $pedidos;
    }

    // Actualizar un pedido
    public function update() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("UPDATE pedidos SET cliente_id = ?, fecha = ?, estado = ?, total = ? WHERE id = ?");
        return $stmt->execute([$this->cliente_id, $this->fecha, $this->estado, $this->total, $this->id]);
    }

    // Eliminar un pedido
    public function delete() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("DELETE FROM pedidos WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
?>