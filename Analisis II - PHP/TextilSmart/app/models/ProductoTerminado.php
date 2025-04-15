<?php

class ProductoTerminado {
    // Propiedades
    private $id;
    private $producto_id;
    private $cantidad;
    private $fecha_registro;
    private $calidad;

    // Constructor
    public function __construct($id, $producto_id, $cantidad, $fecha_registro, $calidad) {
        $this->id = $id;
        $this->producto_id = $producto_id;
        $this->cantidad = $cantidad;
        $this->fecha_registro = $fecha_registro;
        $this->calidad = $calidad;
    }

    // Métodos Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getProductoId() {
        return $this->producto_id;
    }

    public function setProductoId($producto_id) {
        $this->producto_id = $producto_id;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }

    public function setFechaRegistro($fecha_registro) {
        $this->fecha_registro = $fecha_registro;
    }

    public function getCalidad() {
        return $this->calidad;
    }

    public function setCalidad($calidad) {
        $this->calidad = $calidad;
    }

    // Métodos CRUD

    // Crear un nuevo producto terminado
    public function save() {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO productos_terminados (producto_id, cantidad, fecha_registro, calidad) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $this->producto_id, $this->cantidad, $this->fecha_registro, $this->calidad);
        return $stmt->execute();
    }

    // Leer un producto terminado por ID
    public static function find($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM productos_terminados WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object('ProductoTerminado');
    }

    // Leer todos los productos terminados
    public static function all() {
        $db = Database::getConnection();
        $result = $db->query("SELECT * FROM productos_terminados");
        $productos_terminados = [];
        while ($producto_terminado = $result->fetch_object('ProductoTerminado')) {
            $productos_terminados[] = $producto_terminado;
        }
        return $productos_terminados;
    }

    // Actualizar un producto terminado
    public function update() {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE productos_terminados SET producto_id = ?, cantidad = ?, fecha_registro = ?, calidad = ? WHERE id = ?");
        $stmt->bind_param("isssi", $this->producto_id, $this->cantidad, $this->fecha_registro, $this->calidad, $this->id);
        return $stmt->execute();
    }

    // Eliminar un producto terminado
    public function delete() {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM productos_terminados WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}