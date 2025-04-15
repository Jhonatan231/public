<?php
require_once '../models/Proveedor.php'; // Asegúrate de la ruta correcta

class ProveedorController {
    // Crear un nuevo proveedor
    public function crear($data) {
        $proveedor = new Proveedor(null, $data['nombre'], $data['contacto'], $data['telefono'], $data['email'], $data['direccion'], date('Y-m-d'));
        return $proveedor->save(); // Retorna el resultado
    }

    // Actualizar un proveedor existente
    public function actualizar($id, $data) {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            $proveedor->setNombre($data['nombre']);
            $proveedor->setContacto($data['contacto']);
            $proveedor->setTelefono($data['telefono']);
            $proveedor->setEmail($data['email']);
            $proveedor->setDireccion($data['direccion']);
            return $proveedor->update(); // Retorna el resultado
        }
        return false; // Retorna false si no se encuentra el proveedor
    }

    // Eliminar un proveedor
    public function eliminar($id) {
        $proveedor = Proveedor::find($id);
        if ($proveedor) {
            return $proveedor->delete(); // Retorna el resultado de la eliminación
        }
        return false;
    }

    // Ver un proveedor específico
    public function ver($id) {
        return Proveedor::find($id);
    }

    // Listar todos los proveedores
    public function listar() {
        return Proveedor::all();
    }
}
?>