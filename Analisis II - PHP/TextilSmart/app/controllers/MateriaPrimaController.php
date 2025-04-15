<?php
require_once '../models/MateriaPrima.php'; // Asegúrate de la ruta correcta

class MateriaPrimaController {
    // Crear una nueva materia prima
    public function crear($data) {
        $materiaPrima = new MateriaPrima(null, $data['tipo'], $data['cantidad'], $data['unidad_medida'], $data['fecha_adquisicion'], $data['nivel_minimo']);
        return $materiaPrima->save();
    }

    // Actualizar una materia prima existente
    public function actualizar($id, $data) {
        $materiaPrima = MateriaPrima::find($id);
        if ($materiaPrima) {
            $materiaPrima->setTipo($data['tipo']);
            $materiaPrima->setCantidad($data['cantidad']);
            $materiaPrima->setUnidadMedida($data['unidad_medida']);
            $materiaPrima->setFechaAdquisicion($data['fecha_adquisicion']);
            $materiaPrima->setNivelMinimo($data['nivel_minimo']);
            return $materiaPrima->update();
        }
        return false; // Materia prima no encontrada
    }

    // Eliminar una materia prima
    public function eliminar($id) {
        $materiaPrima = MateriaPrima::find($id);
        if ($materiaPrima) {
            return $materiaPrima->delete();
        }
        return false;
    }

    // Ver una materia prima específica
    public function ver($id) {
        return MateriaPrima::find($id);
    }

    // Listar todas las materias primas
    public function listar() {
        return MateriaPrima::all();
    }
}
?>