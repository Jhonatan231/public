<?php
require_once '../models/Proveedor.php';
require_once '../controllers/ProveedorController.php';

$controller = new ProveedorController();
$action = $_GET['action'] ?? 'index';

// Manejo de eliminación
if (isset($_GET['delete_id'])) {
    $controller->eliminar($_GET['delete_id']);
    header('Location: proveedores.php?action=index');
    exit();
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardar nuevo proveedor
            $controller->crear($_POST);
            header('Location: proveedores.php?action=index');
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Proveedor</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>

        
        
        <body>
            <h1>Crear Proveedor</h1>
            <form action="proveedores.php?action=create" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion">

                <label for="fecha_registro">fecha_registro:</label>
                <input type="date" id="fecha_registro" name="fecha_registro">

                <button type="submit">Guardar</button>
                <a href="proveedores.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
            <img src="../../public/images/proveedores.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto; text-align: center; width: 1500px;">
        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Actualizar proveedor
            $controller->actualizar($id, $_POST);
            header('Location: proveedores.php?action=index');
            exit();
        }
        $proveedor = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Proveedor</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Editar Proveedor</h1>
            <form action="proveedores.php?action=edit&id=<?php echo $proveedor->getId(); ?>" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $proveedor->getNombre(); ?>" required>

                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" name="contacto" value="<?php echo $proveedor->getContacto(); ?>" required>

                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" value="<?php echo $proveedor->getTelefono(); ?>" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $proveedor->getEmail(); ?>" required>

                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $proveedor->getDireccion(); ?>">

                <label for="fecha_registro">fecha_registro:</label>
                <input type="date" id="fecha_registro" name="fecha_registro" value="<?php echo $proveedor->getFechaRegistro(); ?>">


                <button type="submit">Actualizar</button>
                <a href="proveedores.php?action=index">Cancelar</a>
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
        $proveedor = $controller->ver($id);
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles del Proveedor</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Detalles del Proveedor</h1>
            <p><strong>ID:</strong> <?php echo $proveedor->getId(); ?></p>
            <p><strong>Nombre:</strong> <?php echo $proveedor->getNombre(); ?></p>
            <p><strong>Contacto:</strong> <?php echo $proveedor->getContacto(); ?></p>
            <p><strong>Teléfono:</strong> <?php echo $proveedor->getTelefono(); ?></p>
            <p><strong>Email:</strong> <?php echo $proveedor->getEmail(); ?></p>
            <p><strong>Dirección:</strong> <?php echo $proveedor->getDireccion(); ?></p>
            <p><strong>fecha_registro:</strong> <?php echo $proveedor->getFechaRegistro(); ?></p>
            <a href="proveedores.php?action=index">Volver a la lista</a>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $proveedores = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Proveedores</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="../../app/views/clientes.php">Clientes</a></li>
                    <li><a href="../../app/views/distribucion.php">Distribucion</a></li>
                    <li><a href="../../app/views/materia_prima.php">Materia Prima</a></li>
                    <li><a href="../../app/views/pedidos.php">Pedidos</a></li>
                    <li><a href="../../app/views/produccion.php">Produccion</a></li>
                    <li><a href="../../app/views/productos.php">Productos</a></li>
                </ul>
            </nav>
            <h1>Lista de Proveedores</h1>
            <a href="proveedores.php?action=create">Agregar Proveedor</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Contacto</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>fecha_registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($proveedores as $proveedor): ?>
                    <tr>
                        <td><?php echo $proveedor->getId(); ?></td>
                        <td><?php echo $proveedor->getNombre(); ?></td>
                        <td><?php echo $proveedor->getContacto(); ?></td>
                        <td><?php echo $proveedor->getTelefono(); ?></td>
                        <td><?php echo $proveedor->getEmail(); ?></td>
                        <td><?php echo $proveedor->getDireccion(); ?></td>
                        <td><?php echo $proveedor->getFechaRegistro(); ?></td>
                        <td>
                            <a href="proveedores.php?action=show&id=<?php echo $proveedor->getId(); ?>">Ver</a>
                            <a href="proveedores.php?action=edit&id=<?php echo $proveedor->getId(); ?>">Editar</a>
                            <a href="proveedores.php?action=index&delete_id=<?php echo $proveedor->getId(); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar este proveedor?');">Eliminar</a>
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