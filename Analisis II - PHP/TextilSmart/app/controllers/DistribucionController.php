<?php
require_once '../models/Distribucion.php';

class DistribucionController {
    // Crear una nueva distribución
    public function crear($data) {
        if (empty($data['fecha_envio']) || empty($data['estado']) || !is_numeric($data['pedido_id'])) { // Cambiado
            return false; // Manejo de error de validación
        }

        $distribucion = new Distribucion(null, $data['pedido_id'], $data['fecha_envio'], $data['estado']); // Cambiado
        return $distribucion->save();
    }

    // Leer una distribución por ID
    public function ver($id) {
        return Distribucion::find($id);
    }

    // Leer todas las distribuciones
    public function listar() {
        return Distribucion::all();
    }

    // Actualizar una distribución
    public function actualizar($id, $data) {
        $distribucion = Distribucion::find($id);
        if ($distribucion) {
            $distribucion->setPedidoId($data['pedido_id']); // Cambiado
            $distribucion->setFechaEnvio($data['fecha_envio']); // Cambiado
            $distribucion->setEstado($data['estado']);
            return $distribucion->update();
        }
        return false;
    }

    // Eliminar una distribución
    public function eliminar($id) {
        $distribucion = Distribucion::find($id);
        if ($distribucion) {
            return $distribucion->delete();
        }
        return false;
    }
}
?>