<?php

require_once 'Producto.php';

class ProductoController {
    // Crear un nuevo producto
    public function crear($data) {
        $producto = new Producto(null, $data['nombre'], $data['precio'], $data['descripcion'], date('Y-m-d H:i:s'));
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