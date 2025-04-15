<?php
require_once '../models/Produccion.php';
require_once '../controllers/ProduccionController.php';

$controller = new ProduccionController();
$action = $_GET['action'] ?? 'index';

// Manejo de eliminación
if (isset($_GET['delete_id'])) {
    $controller->eliminar($_GET['delete_id']);
    header('Location: produccion.php?action=index');
    exit();
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardar nueva producción
            if ($controller->crear($_POST)) {
                header('Location: produccion.php?action=index');
                exit();
            } else {
                // Manejar error de creación
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Producción</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Crear Producción</h1>
            <form action="produccion.php?action=create" method="POST">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" required>

                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" required>

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="activo">Activo</option>
                    <option value="inactivo">Inactivo</option>
                </select>

                <label for="producto_id">ID Producto:</label>
                <input type="number" id="producto_id" name="producto_id" required>

                <button type="submit">Guardar</button>
                <a href="produccion.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
            <img src="../../public/images/produccion.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto; text-align: center; width: 1500px;">
        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Actualizar producción
            if ($controller->actualizar($id, $_POST)) {
                header('Location: produccion.php?action=index');
                exit();
            } else {
                // Manejar error de actualización
            }
        }
        $produccion = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Producción</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Editar Producción</h1>
            <form action="produccion.php?action=edit&id=<?php echo $produccion->getId(); ?>" method="POST">
                <label for="fecha_inicio">Fecha Inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="<?php echo $produccion->getFechaInicio(); ?>" required>

                <label for="fecha_fin">Fecha Fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" value="<?php echo $produccion->getFechaFin(); ?>" required>

                <label for="estado">Estado:</label>
                <select id="estado" name="estado" required>
                    <option value="activo" <?php echo $produccion->getEstado() === 'activo' ? 'selected' : ''; ?>>Activo</option>
                    <option value="inactivo" <?php echo $produccion->getEstado() === 'inactivo' ? 'selected' : ''; ?>>Inactivo</option>
                </select>

                <label for="producto_id">ID Producto:</label>
                <input type="number" id="producto_id" name="producto_id" value="<?php echo $produccion->getProductoId(); ?>" required>

                <button type="submit">Actualizar</button>
                <a href="produccion.php?action=index">Cancelar</a>
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
        $produccion = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles de Producción</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Detalles de Producción</h1>
            <p><strong>ID:</strong> <?php echo $produccion->getId(); ?></p>
            <p><strong>Fecha Inicio:</strong> <?php echo $produccion->getFechaInicio(); ?></p>
            <p><strong>Fecha Fin:</strong> <?php echo $produccion->getFechaFin(); ?></p>
            <p><strong>Estado:</strong> <?php echo $produccion->getEstado(); ?></p>
            <p><strong>ID Producto:</strong> <?php echo $produccion->getProductoId(); ?></p>
            <a href="produccion.php?action=index">Volver a la lista</a>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $producciones = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Producciones</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="distribucion.php">Distribución</a></li>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="materia_prima.php">Materia Prima</a></li>
                    <li><a href="pedidos.php">Pedido</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                </ul>
            </nav>
            <h1>Lista de Producciones</h1>
            <a href="produccion.php?action=create">Agregar Producción</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>ID Producto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($producciones as $produccion): ?>
                    <tr>
                        <td><?php echo $produccion->getId(); ?></td>
                        <td><?php echo $produccion->getFechaInicio(); ?></td>
                        <td><?php echo $produccion->getFechaFin(); ?></td>
                        <td><?php echo $produccion->getEstado(); ?></td>
                        <td><?php echo $produccion->getProductoId(); ?></td>
                        <td>
                            <a href="produccion.php?action=show&id=<?php echo $produccion->getId(); ?>">Ver</a>
                            <a href="produccion.php?action=edit&id=<?php echo $produccion->getId(); ?>">Editar</a>
                            <a href="produccion.php?action=index&delete_id=<?php echo $produccion->getId(); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta producción?');">Eliminar</a>
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