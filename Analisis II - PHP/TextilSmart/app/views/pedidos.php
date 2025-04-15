<?php
require_once '../models/Pedido.php';
require_once '../controllers/PedidoController.php';

$controller = new PedidoController();
$action = $_GET['action'] ?? 'index';

// Manejo de eliminación
if (isset($_GET['delete_id'])) {
    $controller->eliminar($_GET['delete_id']);
    header('Location: pedidos.php?action=index');
    exit();
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardar nuevo pedido
            $controller->crear($_POST);
            header('Location: pedidos.php?action=index');
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Pedido</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
                  
        </head>
        <body>
            
            <h1>Crear Pedido</h1>
            <form action="pedidos.php?action=create" method="POST">
                <label for="cliente_id">ID Cliente:</label>
                <input type="number" id="cliente_id" name="cliente_id" required>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>

                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" required>

                <label for="total">Total:</label>
                <input type="number" id="total" name="total" required>

                <button type="submit">Guardar</button>
                <a href="pedidos.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>

            <img src="../../public/images/pedido.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto; text-align: center; width: 1500px;">
        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Actualizar pedido
            $controller->actualizar($id, $_POST);
            header('Location: pedidos.php?action=index');
            exit();
        }
        $pedido = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Pedido</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Editar Pedido</h1>
            <form action="pedidos.php?action=edit&id=<?php echo $pedido->getId(); ?>" method="POST">
                <label for="cliente_id">ID Cliente:</label>
                <input type="number" id="cliente_id" name="cliente_id" value="<?php echo $pedido->getClienteId(); ?>" required>

                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" value="<?php echo $pedido->getFecha(); ?>" required>

                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado" value="<?php echo $pedido->getEstado(); ?>" required>

                <label for="total">Total:</label>
                <input type="number" id="total" name="total" value="<?php echo $pedido->getTotal(); ?>" required>

                <button type="submit">Actualizar</button>
                <a href="pedidos.php?action=index">Cancelar</a>
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
        $pedido = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles del Pedido</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Detalles del Pedido</h1>
            <p><strong>ID:</strong> <?php echo $pedido->getId(); ?></p>
            <p><strong>ID Cliente:</strong> <?php echo $pedido->getClienteId(); ?></p>
            <p><strong>Fecha:</strong> <?php echo $pedido->getFecha(); ?></p>
            <p><strong>Estado:</strong> <?php echo $pedido->getEstado(); ?></p>
            <p><strong>Total:</strong> <?php echo $pedido->getTotal(); ?></p>
            <a href="pedidos.php?action=index">Volver a la lista</a>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $pedidos = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Pedidos</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="distribucion.php">Distribución</a></li>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="materia_prima.php">Materia Prima</a></li>
                    <li><a href="produccion.php">Producción</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                </ul>
            </nav>
            <h1>Lista de Pedidos</h1>
            <a href="pedidos.php?action=create">Agregar Pedido</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Cliente</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?php echo $pedido->getId(); ?></td>
                        <td><?php echo $pedido->getClienteId(); ?></td>
                        <td><?php echo $pedido->getFecha(); ?></td>
                        <td><?php echo $pedido->getEstado(); ?></td>
                        <td><?php echo $pedido->getTotal(); ?></td>
                        <td>
                            <a href="pedidos.php?action=show&id=<?php echo $pedido->getId(); ?>">Ver</a>
                            <a href="pedidos.php?action=edit&id=<?php echo $pedido->getId(); ?>">Editar</a>
                            <a href="pedidos.php?action=index&delete_id=<?php echo $pedido->getId(); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?');">Eliminar</a>
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