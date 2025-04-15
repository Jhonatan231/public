<?php
require_once '../config/database.php'; // Asegúrate de la ruta correcta

class Proveedor {
    // Propiedades
    private $id;
    private $nombre;
    private $contacto;
    private $telefono;
    private $email;
    private $direccion;
    private $fecha_registro;

    // Constructor
    public function __construct($id = null, $nombre, $contacto, $telefono, $email, $direccion, $fecha_registro) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contacto = $contacto;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->direccion = $direccion;
        $this->fecha_registro = $fecha_registro;
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

    public function getContacto() {
        return $this->contacto;
    }

    public function setContacto($contacto) {
        $this->contacto = $contacto;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getFechaRegistro() {
        return $this->fecha_registro;
    }

    // Métodos CRUD

    // Crear un nuevo proveedor
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("INSERT INTO Proveedores (nombre, contacto, telefono, email, direccion, fecha_registro) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$this->nombre, $this->contacto, $this->telefono, $this->email, $this->direccion, $this->fecha_registro]);
    }

    // Leer un proveedor por ID
    public static function find($id) {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("SELECT * FROM Proveedores WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new self($data['id'], $data['nombre'], $data['contacto'], $data['telefono'], $data['email'], $data['direccion'], $data['fecha_registro']) : null;
    }

    // Leer todos los proveedores
    public static function all() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->query("SELECT * FROM Proveedores");
        $proveedores = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $proveedores[] = new self($data['id'], $data['nombre'], $data['contacto'], $data['telefono'], $data['email'], $data['direccion'], $data['fecha_registro']);
        }
        return $proveedores;
    }

    // Actualizar un proveedor
    public function update() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("UPDATE Proveedores SET nombre = ?, contacto = ?, telefono = ?, email = ?, direccion = ? WHERE id = ?");
        return $stmt->execute([$this->nombre, $this->contacto, $this->telefono, $this->email, $this->direccion, $this->id]);
    }

    // Eliminar un proveedor
    public function delete() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("DELETE FROM Proveedores WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
?>