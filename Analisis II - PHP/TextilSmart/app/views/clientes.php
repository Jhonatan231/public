<?php
require_once '../models/Cliente.php';
require_once '../controllers/ClienteController.php';

$controller = new ClienteController();
$action = $_GET['action'] ?? 'index';

// Manejo de eliminación
if (isset($_GET['delete_id'])) {
    $controller->eliminar($_GET['delete_id']);
    header('Location: clientes.php?action=index');
    exit();
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardar nuevo cliente
            $controller->crear($_POST);
            header('Location: clientes.php?action=index');
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Cliente</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="clientes.php?action=index">Lista de Clientes</a></li>
                        <li><a href="clientes.php?action=create">Crear Cliente</a></li>
                        <li><a href="distribucion.php">Distribución</a></li>
                        <li><a href="materia_prima.php">Materia Prima</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="produccion.php">Producción</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="proveedores.php">Proveedores</a></li>
                    </ul>
                </nav>
                <h1>Crear Cliente</h1>

                <link rel="stylesheet" href="../public/css/estilo.css">
                

                <form action="clientes.php?action=create" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion">

                    <button type="submit">Guardar</button>
                    <a href="clientes.php?action=index">Cancelar</a>
                </form>
            </div>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Actualizar cliente
            $controller->actualizar($id, $_POST);
            header('Location: clientes.php?action=index');
            exit();
        }
        $cliente = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Cliente</title>
            <link rel="stylesheet" href="../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="clientes.php?action=index">Lista de Clientes</a></li>
                        <li><a href="clientes.php?action=create">Crear Cliente</a></li>
                        <li><a href="distribucion.php">Distribución</a></li>
                        <li><a href="materia_prima.php">Materia Prima</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="produccion.php">Producción</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="proveedores.php">Proveedores</a></li>
                    </ul>
                </nav>
                <h1>Editar Cliente</h1>
                <link rel="stylesheet" href="../../public/css/estilo.css">
                <form action="clientes.php?action=edit&id=<?php echo $cliente->getId(); ?>" method="POST">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="<?php echo $cliente->getNombre(); ?>" required>

                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" value="<?php echo $cliente->getApellido(); ?>" required>

                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" value="<?php echo $cliente->getTelefono(); ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $cliente->getEmail(); ?>" required>

                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $cliente->getDireccion(); ?>">

                    <button type="submit">Actualizar</button>
                    <a href="clientes.php?action=index">Cancelar</a>
                </form>
            </div>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'show':
        $id = $_GET['id'] ?? null;
        $cliente = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles del Cliente</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="clientes.php?action=index">Lista de Clientes</a></li>
                        <li><a href="clientes.php?action=create">Crear Cliente</a></li>
                        <li><a href="distribucion.php">Distribución</a></li>
                        <li><a href="materia_prima.php">Materia Prima</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="produccion.php">Producción</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="proveedores.php">Proveedores</a></li>
                    </ul>
                </nav>
                <h1>Detalles del Cliente</h1>
                <p><strong>ID:</strong> <?php echo $cliente->getId(); ?></p>
                <p><strong>Nombre:</strong> <?php echo $cliente->getNombre(); ?></p>
                <p><strong>Apellido:</strong> <?php echo $cliente->getApellido(); ?></p>
                <p><strong>Teléfono:</strong> <?php echo $cliente->getTelefono(); ?></p>
                <p><strong>Email:</strong> <?php echo $cliente->getEmail(); ?></p>
                <p><strong>Dirección:</strong> <?php echo $cliente->getDireccion(); ?></p>
                <a href="clientes.php?action=index">Volver a la lista</a>
            </div>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $clientes = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Clientes</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <div class="container">
                <nav>
                    <ul>
                        <li><a href="distribucion.php">Distribución</a></li>
                        <li><a href="materia_prima.php">Materia Prima</a></li>
                        <li><a href="pedidos.php">Pedidos</a></li>
                        <li><a href="produccion.php">Producción</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="proveedores.php">Proveedores</a></li>
                    </ul>
                </nav>
                <h1>Lista de Clientes</h1>
                <a href="clientes.php?action=create">Agregar Cliente</a>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td><?php echo $cliente->getId(); ?></td>
                            <td><?php echo $cliente->getNombre(); ?></td>
                            <td><?php echo $cliente->getApellido(); ?></td>
                            <td><?php echo $cliente->getTelefono(); ?></td>
                            <td><?php echo $cliente->getEmail(); ?></td>
                            <td><?php echo $cliente->getDireccion(); ?></td>
                            <td>
                                <a href="clientes.php?action=show&id=<?php echo $cliente->getId(); ?>">Ver</a>
                                <a href="clientes.php?action=edit&id=<?php echo $cliente->getId(); ?>">Editar</a>
                                <a href="clientes.php?action=index&delete_id=<?php echo $cliente->getId(); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?');">Eliminar</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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