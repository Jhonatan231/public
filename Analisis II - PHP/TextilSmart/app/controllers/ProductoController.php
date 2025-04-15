<?php

require_once '../models/Producto.php'; // Asegúrate de la ruta correcta

class ProductoController {
    // Crear un nuevo producto
    public function crear($data) {
        // Establecer la fecha de creación aquí
        $data['fecha_creacion'] = date('Y-m-d H:i:s');
        $producto = new Producto(null, $data['nombre'], $data['precio'], $data['descripcion'], $data['fecha_creacion']);
        return $producto->save();
    }

    // Leer un producto por ID
    public function ver($id) {
        return Producto::find($id);
    }

    // Leer todos los productos
    public function listar() {
        return Producto::all();
    }

    // Actualizar un producto
    public function actualizar($id, $data) {
        $producto = Producto::find($id);
        if ($producto) {
            $producto->setNombre($data['nombre']);
            $producto->setPrecio($data['precio']);
            $producto->setDescripcion($data['descripcion']);
            $producto->setFechaCreacion($data['fecha_creacion']);
            // No actualizamos la fecha de creación
            return $producto->update();
        }
        return false;
    }

    // Eliminar un producto
    public function eliminar($id) {
        $producto = Producto::find($id);
        if ($producto) {
            return $producto->delete();
        }
        return false;
    }
}
?>