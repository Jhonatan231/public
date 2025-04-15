<?php
require_once '../models/Producto.php';
require_once '../controllers/ProductoController.php';

$controller = new ProductoController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardar nuevo producto
            $controller->crear($_POST);
            header('Location: productos.php?action=index');
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Producto</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Crear Producto</h1>
            <form action="productos.php?action=create" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" step="0.01" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required></textarea>

                <label for="fecha_creacion">Fecha_creacion</label>
                <textarea id="fecha_cracion" name="fecha_creacion" required></textarea>

                <button type="submit">Guardar</button>
                <a href="productos.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
            <img src="../../public/images/producto.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto; text-align: center; width: 1500px;">
        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Actualizar producto
            $controller->actualizar($id, $_POST);
            header('Location: productos.php?action=index');
            exit();
        }
        $producto = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Producto</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Editar Producto</h1>
            <form action="productos.php?action=edit&id=<?php echo $producto->getId(); ?>" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $producto->getNombre(); ?>" required>

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" value="<?php echo $producto->getPrecio(); ?>" step="0.01" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required><?php echo $producto->getDescripcion(); ?></textarea>

                <label for="fecha_creacion">fecha_creacion:</label>
                <textarea id="fecha_creacion" name="fecha_creacion" required><?php echo $producto->getFechaCreacion(); ?></textarea>

                <button type="submit">Actualizar</button>
                <a href="productos.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'show':
        $id = $_GET['id'] ?? null;
        $producto = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles del Producto</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Detalles del Producto</h1>
            <p><strong>ID:</strong> <?php echo $producto->getId(); ?></p>
            <p><strong>Nombre:</strong> <?php echo $producto->getNombre(); ?></p>
            <p><strong>Precio:</strong> <?php echo $producto->getPrecio(); ?></p>
            <p><strong>Descripción:</strong> <?php echo $producto->getDescripcion(); ?></p>
            <p><strong>Fecha de Creación:</strong> <?php echo $producto->getFechaCreacion(); ?></p>
            <a href="productos.php?action=index">Volver a la lista</a>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $productos = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Productos</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="distribucion.php">Distribución</a></li>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="materia_prima.php">Materia Prima</a></li>
                    <li><a href="pedidos.php">Pedido</a></li>
                    <li><a href="produccion.php">Produccion</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                </ul>
            </nav>
            <h1>Lista de Productos</h1>
            <a href="productos.php?action=create">Agregar Producto</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Fecha de Creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto->getId(); ?></td>
                        <td><?php echo $producto->getNombre(); ?></td>
                        <td><?php echo $producto->getPrecio(); ?></td>
                        <td><?php echo $producto->getDescripcion(); ?></td>
                        <td><?php echo $producto->getFechaCreacion(); ?></td>
                        <td>
                            <a href="productos.php?action=show&id=<?php echo $producto->getId(); ?>">Ver</a>
                            <a href="productos.php?action=edit&id=<?php echo $producto->getId(); ?>">Editar</a>
                            <a href="delete.php?id=<?php echo $producto->getId(); ?>">Eliminar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
            <img src="../../public/images/Industria-textil.jpg" alt="Descripción de la imagen" style="max-width: 46%; height: auto; text-align: center; transform: scale(1.05);">
            <img src="../../public/images/textil.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto; text-align: center; float: right; transform: scale(1.05);">
        </body>
        </html>
        <?php
        break;
}
?>