<?php

require_once '../config/database.php'; // Asegúrate de la ruta correcta

class Producto {
    // Propiedades
    private $id;
    private $nombre;
    private $precio;
    private $descripcion;
    private $fecha_creacion;

    // Constructor
    public function __construct($id = null, $nombre, $precio, $descripcion, $fecha_creacion = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->descripcion = $descripcion;
        $this->fecha_creacion = $fecha_creacion ?? date('Y-m-d H:i:s'); // Asignar fecha actual si no se proporciona
    }

    // Métodos Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    // Métodos CRUD

    // Crear un nuevo producto
    public function save() {
        $database = new Database(); // Crear instancia de Database
        $db = $database->getConnection(); // Obtener conexión

        $stmt = $db->prepare("INSERT INTO productos (nombre, precio, descripcion, fecha_creacion) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$this->nombre, $this->precio, $this->descripcion, $this->fecha_creacion]);
    }

    // Leer un producto por ID
    public static function find($id) {
        $database = new Database(); // Crear instancia de Database
        $db = $database->getConnection(); // Obtener conexión

        $stmt = $db->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new self($data['id'], $data['nombre'], $data['precio'], $data['descripcion'], $data['fecha_creacion']) : null;
    }

    // Leer todos los productos
    public static function all() {
        $database = new Database(); // Crear instancia de Database
        $db = $database->getConnection(); // Obtener conexión

        $stmt = $db->query("SELECT * FROM productos");
        $productos = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new self($data['id'], $data['nombre'], $data['precio'], $data['descripcion'], $data['fecha_creacion']);
        }
        return $productos;
    }

    // Actualizar un producto
    public function update() {
        $database = new Database(); // Crear instancia de Database
        $db = $database->getConnection(); // Obtener conexión

        $stmt = $db->prepare("UPDATE productos SET nombre = ?, precio = ?, descripcion = ?, fecha_creacion = ? WHERE id = ?");
        return $stmt->execute([$this->nombre, $this->precio, $this->descripcion, $this->id, $this->id]);
    }

    // Eliminar un producto
    public function delete() {
        $database = new Database(); // Crear instancia de Database
        $db = $database->getConnection(); // Obtener conexión

        $stmt = $db->prepare("DELETE FROM productos WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
?>