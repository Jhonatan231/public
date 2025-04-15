<?php
require_once '../config/database.php'; // Asegúrate de la ruta correcta

class Produccion {
    // Propiedades
    private $id;
    private $fecha_inicio;
    private $fecha_fin;
    private $estado;
    private $producto_id;

    // Constructor
    public function __construct($id = null, $fecha_inicio, $fecha_fin, $estado, $producto_id) {
        $this->id = $id;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->estado = $estado;
        $this->producto_id = $producto_id;
    }

    // Métodos Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getFechaInicio() {
        return $this->fecha_inicio;
    }

    public function setFechaInicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function getFechaFin() {
        return $this->fecha_fin;
    }

    public function setFechaFin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getProductoId() {
        return $this->producto_id;
    }

    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }

    // Métodos CRUD

    // Crear una nueva producción
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("INSERT INTO produccion (fecha_inicio, fecha_fin, estado, producto_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->fecha_inicio, $this->fecha_fin, $this->estado, $this->producto_id]);
    }

    // Leer una producción por ID
    public static function find($id) {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("SELECT * FROM produccion WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new self($data['id'], $data['fecha_inicio'], $data['fecha_fin'], $data['estado'], $data['producto_id']) : null;
    }

    // Leer todas las producciones
    public static function all() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->query("SELECT * FROM produccion");
        $producciones = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $producciones[] = new self($data['id'], $data['fecha_inicio'], $data['fecha_fin'], $data['estado'], $data['producto_id']);
        }
        return $producciones;
    }

    // Actualizar una producción
    public function update() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("UPDATE produccion SET fecha_inicio = ?, fecha_fin = ?, estado = ?, producto_id = ? WHERE id = ?");
        return $stmt->execute([$this->fecha_inicio, $this->fecha_fin, $this->estado, $this->producto_id, $this->id]);
    }

    // Eliminar una producción
    public function delete() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("DELETE FROM produccion WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
?>