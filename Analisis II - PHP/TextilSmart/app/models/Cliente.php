<?php
require_once '../config/database.php'; // Asegúrate de la ruta correcta

class Cliente {
    // Propiedades
    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $telefono;
    private $direccion;
    private $fecha_registro;

    // Constructor
    public function __construct($id = null, $nombre, $apellido, $email, $telefono, $direccion, $fecha_registro) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->telefono = $telefono;
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

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
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

    // Crear un nuevo cliente
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("INSERT INTO clientes (nombre, apellido, email, telefono, direccion, fecha_registro) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$this->nombre, $this->apellido, $this->email, $this->telefono, $this->direccion, $this->fecha_registro]);
    }

    // Leer un cliente por ID
    public static function find($id) {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("SELECT * FROM clientes WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new self($data['id'], $data['nombre'], $data['apellido'], $data['email'], $data['telefono'], $data['direccion'], $data['fecha_registro']) : null;
    }

    // Leer todos los clientes
    public static function all() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->query("SELECT * FROM clientes");
        $clientes = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $clientes[] = new self($data['id'], $data['nombre'], $data['apellido'], $data['email'], $data['telefono'], $data['direccion'], $data['fecha_registro']);
        }
        return $clientes;
    }

    // Actualizar un cliente
    public function update() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("UPDATE clientes SET nombre = ?, apellido = ?, email = ?, telefono = ?, direccion = ? WHERE id = ?");
        return $stmt->execute([$this->nombre, $this->apellido, $this->email, $this->telefono, $this->direccion, $this->id]);
    }

    // Eliminar un cliente
    public function delete() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("DELETE FROM clientes WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
?>