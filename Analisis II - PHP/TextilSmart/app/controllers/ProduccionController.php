<?php
require_once '../models/Produccion.php'; // Asegúrate de la ruta correcta

class ProduccionController {
    // Crear una nueva producción
    public function crear($data) {
        $produccion = new Produccion(null, $data['fecha_inicio'], $data['fecha_fin'], $data['estado'], $data['producto_id']);
        return $produccion->save();
    }

    // Actualizar una producción existente
    public function actualizar($id, $data) {
        $produccion = Produccion::find($id);
        if ($produccion) {
            $produccion->setFechaInicio($data['fecha_inicio']);
            $produccion->setFechaFin($data['fecha_fin']);
            $produccion->setEstado($data['estado']);
            $produccion->setProductoId($data['producto_id']);
            return $produccion->update();
        }
        return false;
    }

    // Eliminar una producción
    public function eliminar($id) {
        $produccion = Produccion::find($id);
        if ($produccion) {
            return $produccion->delete();
        }
        return false;
    }

    // Ver una producción específica
    public function ver($id) {
        return Produccion::find($id);
    }

    // Listar todas las producciones
    public function listar() {
        return Produccion::all();
    }
}
?>