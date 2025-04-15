<?php
require_once '../models/Distribucion.php';
require_once '../controllers/DistribucionController.php';

$controller = new DistribucionController();
$action = $_GET['action'] ?? 'index';

// Manejo de eliminación
if (isset($_GET['delete_id'])) {
    $controller->eliminar($_GET['delete_id']);
    header('Location: distribucion.php?action=index');
    exit();
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$controller->crear($_POST)) {
                echo "<p>Hubo un error al crear la distribución. Por favor, verifica los datos.</p>";
            } else {
                header('Location: distribucion.php?action=index');
                exit();
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Distribución</title>
            <link rel="stylesheet" href="../../public/css/estilo.css">
        </head>
        <body>

            <h1>Crear Distribución</h1>
            <link rel="stylesheet" href="../../public/css/estilo.css">
            <form action="distribucion.php?action=create" method="POST">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>

                <label for="pedido_id">ID Pedido:</label> <!-- Cambiado -->
                <input type="number" id="pedido_id" name="pedido_id" required> <!-- Cambiado -->

                <label for="fecha_envio">Fecha de Envío:</label> <!-- Cambiado -->
                <input type="date" id="fecha_envio" name="fecha_envio" required> <!-- Cambiado -->

                <button type="submit">Guardar</button>
                <a href="distribucion.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
            <img src="../../public/images/distribucion.jpg" alt="Descripción de la imagen" style="max-width: 50%; height: auto; text-align: center;">
            <img src="../../public/images/distribucion.jpg" alt="Descripción de la imagen" style="max-width: 50%; height: auto; text-align: center; float: right;">

        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!$controller->actualizar($id, $_POST)) {
                echo "<p>Hubo un error al actualizar la distribución. Por favor, verifica los datos.</p>";
            } else {
                header('Location: distribucion.php?action=index');
                exit();
            }
        }
        $distribucion = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Distribución</title>
            <link rel="stylesheet" href="../../public/css/estilo.css">
        </head>
        <body>
            <h1>Editar Distribución</h1>
            <form action="distribucion.php?action=edit&id=<?php echo $distribucion->getId(); ?>" method="POST">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?php echo $distribucion->getEstado(); ?>" required>

                <label for="pedido_id">ID Pedido:</label> <!-- Cambiado -->
                <input type="number" id="pedido_id" name="pedido_id" value="<?php echo $distribucion->getPedidoId(); ?>" required> <!-- Cambiado -->

                <label for="fecha_envio">Fecha de Envío:</label> <!-- Cambiado -->
                <input type="date" id="fecha_envio" name="fecha_envio" value="<?php echo $distribucion->getFechaEnvio(); ?>" required> <!-- Cambiado -->

                <button type="submit">Actualizar</button>
                <a href="distribucion.php?action=index">Cancelar</a>
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
        $distribucion = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles de la Distribución</title>
            <link rel="stylesheet" href="../../public/css/estilo.css">
        </head>
        <body>
            <h1>Detalles de la Distribución</h1>
            <p><strong>ID:</strong> <?php echo $distribucion->getId(); ?></p>
            <p><strong>Estado:</strong> <?php echo $distribucion->getEstado(); ?></p>
            <p><strong>ID Pedido:</strong> <?php echo $distribucion->getPedidoId(); ?></p> <!-- Cambiado -->
            <p><strong>Fecha de Envío:</strong> <?php echo $distribucion->getFechaEnvio(); ?></p> <!-- Cambiado -->
            <a href="distribucion.php?action=index">Volver a la lista</a>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $distribuciones = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Distribuciones</title>
            <link rel="stylesheet" href="../../public/css/estilo.css">
        </head>
        <body>

            <nav>
                <ul>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="materia_prima.php">Materia Prima</a></li>
                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="produccion.php">Producción</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                </ul>
            </nav>

            <h1>Lista de Distribuciones</h1>
            <a href="distribucion.php?action=create">Agregar Distribución</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estado</th>
                        <th>ID Pedido</th> <!-- Cambiado -->
                        <th>Fecha de Envío</th> <!-- Cambiado -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($distribuciones as $distribucion): ?>
                    <tr>
                        <td><?php echo $distribucion->getId(); ?></td>
                        <td><?php echo $distribucion->getEstado(); ?></td>
                        <td><?php echo $distribucion->getPedidoId(); ?></td> <!-- Cambiado -->
                        <td><?php echo $distribucion->getFechaEnvio(); ?></td> <!-- Cambiado -->
                        <td>
                            <a href="distribucion.php?action=show&id=<?php echo $distribucion->getId(); ?>">Ver</a>
                            <a href="distribucion.php?action=edit&id=<?php echo $distribucion->getId(); ?>">Editar</a>
                            <a href="distribucion.php?action=index&delete_id=<?php echo $distribucion->getId(); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta distribución?');">Eliminar</a>
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