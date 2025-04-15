<?php
require_once '../config/database.php'; // Asegúrate de la ruta correcta

class MateriaPrima {
    // Propiedades
    private $id;
    private $tipo;
    private $cantidad;
    private $unidad_medida;
    private $fecha_adquisicion;
    private $nivel_minimo;

    // Constructor
    public function __construct($id = null, $tipo, $cantidad, $unidad_medida, $fecha_adquisicion, $nivel_minimo) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->cantidad = $cantidad;
        $this->unidad_medida = $unidad_medida;
        $this->fecha_adquisicion = $fecha_adquisicion;
        $this->nivel_minimo = $nivel_minimo;
    }

    // Métodos Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function getUnidadMedida() {
        return $this->unidad_medida;
    }

    public function setUnidadMedida($unidad_medida) {
        $this->unidad_medida = $unidad_medida;
    }

    public function getFechaAdquisicion() {
        return $this->fecha_adquisicion;
    }

    public function setFechaAdquisicion($fecha_adquisicion) {
        $this->fecha_adquisicion = $fecha_adquisicion;
    }

    public function getNivelMinimo() {
        return $this->nivel_minimo;
    }

    public function setNivelMinimo($nivel_minimo) {
        $this->nivel_minimo = $nivel_minimo;
    }

    // Métodos CRUD

    // Crear una nueva materia prima
    public function save() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("INSERT INTO materias_primas (tipo, cantidad, unidad_medida, fecha_adquisicion, nivel_minimo) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$this->tipo, $this->cantidad, $this->unidad_medida, $this->fecha_adquisicion, $this->nivel_minimo]);
    }

    // Leer una materia prima por ID
    public static function find($id) {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("SELECT * FROM materias_primas WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ? new self($data['id'], $data['tipo'], $data['cantidad'], $data['unidad_medida'], $data['fecha_adquisicion'], $data['nivel_minimo']) : null;
    }

    // Leer todas las materias primas
    public static function all() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->query("SELECT * FROM materias_primas");
        $materias_primas = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $materias_primas[] = new self($data['id'], $data['tipo'], $data['cantidad'], $data['unidad_medida'], $data['fecha_adquisicion'], $data['nivel_minimo']);
        }
        return $materias_primas;
    }

    // Actualizar una materia prima
    public function update() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("UPDATE materias_primas SET tipo = ?, cantidad = ?, unidad_medida = ?, fecha_adquisicion = ?, nivel_minimo = ? WHERE id = ?");
        return $stmt->execute([$this->tipo, $this->cantidad, $this->unidad_medida, $this->fecha_adquisicion, $this->nivel_minimo, $this->id]);
    }

    // Eliminar una materia prima
    public function delete() {
        $database = new Database();
        $db = $database->getConnection();

        $stmt = $db->prepare("DELETE FROM materias_primas WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
?>