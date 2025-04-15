<?php
require_once '../models/Cliente.php'; // Asegúrate de la ruta correcta

class ClienteController {
    // Crear un nuevo cliente
    public function crear($data) {
        $cliente = new Cliente(null, $data['nombre'], $data['apellido'], $data['email'], $data['telefono'], $data['direccion'], date('Y-m-d'));
        $cliente->save();
    }

    // Actualizar un cliente existente
    public function actualizar($id, $data) {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->setNombre($data['nombre']);
            $cliente->setApellido($data['apellido']);
            $cliente->setTelefono($data['telefono']);
            $cliente->setEmail($data['email']);
            $cliente->setDireccion($data['direccion']);
            $cliente->update();
        }
    }

    // Eliminar un cliente
    public function eliminar($id) {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            return true;
        }
        return false;
    }

    // Ver un cliente específico
    public function ver($id) {
        return Cliente::find($id);
    }

    // Listar todos los clientes
    public function listar() {
        return Cliente::all();
    }
}
?>