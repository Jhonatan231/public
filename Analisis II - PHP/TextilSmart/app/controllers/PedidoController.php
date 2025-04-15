<?php
require_once '../models/Pedido.php'; // Asegúrate de la ruta correcta

class PedidoController {
    // Crear un nuevo pedido
    public function crear($data) {
        $pedido = new Pedido(null, $data['cliente_id'], $data['fecha'], $data['estado'], $data['total']);
        $pedido->save();
    }

    // Actualizar un pedido existente
    public function actualizar($id, $data) {
        $pedido = Pedido::find($id);
        if ($pedido) {
            $pedido->setClienteId($data['cliente_id']);
            $pedido->setFecha($data['fecha']);
            $pedido->setEstado($data['estado']);
            $pedido->setTotal($data['total']);
            $pedido->update();
        }
    }

    // Eliminar un pedido
    public function eliminar($id) {
        $pedido = Pedido::find($id);
        if ($pedido) {
            $pedido->delete();
            return true;
        }
        return false;
    }

    // Ver un pedido específico
    public function ver($id) {
        return Pedido::find($id);
    }

    // Listar todos los pedidos
    public function listar() {
        return Pedido::all();
    }
}
?>