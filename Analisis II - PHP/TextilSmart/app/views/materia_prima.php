<?php
require_once '../models/MateriaPrima.php';
require_once '../controllers/MateriaPrimaController.php';

$controller = new MateriaPrimaController();
$action = $_GET['action'] ?? 'index';

// Manejo de eliminación
if (isset($_GET['delete_id'])) {
    $controller->eliminar($_GET['delete_id']);
    header('Location: materia_prima.php?action=index');
    exit();
}

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Guardar nueva materia prima
            $controller->crear($_POST);
            header('Location: materia_prima.php?action=index');
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Crear Materia Prima</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
           
            
            <h1>Crear Materia Prima</h1>
            <form action="materia_prima.php?action=create" method="POST">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" required>

                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" required>

                <label for="unidad_medida">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" required>

                <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                <input type="date" id="fecha_adquisicion" name="fecha_adquisicion" required>

                <label for="nivel_minimo">Nivel Mínimo:</label>
                <input type="number" id="nivel_minimo" name="nivel_minimo" required>

                <button type="submit">Guardar</button>
                <a href="materia_prima.php?action=index">Cancelar</a>
            </form>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
            <img src="../../public/images/materia.jpg" alt="Descripción de la imagen" style="max-width: 100%; height: auto; text-align: center; width: 1500px;">
            
        </body>
        </html>
        <?php
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $materiaPrima = $controller->ver($id);
        if (!$materiaPrima) {
            echo "Materia prima no encontrada.";
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Actualizar materia prima
            if ($controller->actualizar($id, $_POST)) {
                header('Location: materia_prima.php?action=index');
                exit();
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Materia Prima</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Editar Materia Prima</h1>
            <form action="materia_prima.php?action=edit&id=<?php echo $materiaPrima->getId(); ?>" method="POST">
                <label for="tipo">Tipo:</label>
                <input type="text" id="tipo" name="tipo" value="<?php echo $materiaPrima->getTipo(); ?>" required>

                <label for="cantidad">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" value="<?php echo $materiaPrima->getCantidad(); ?>" required>

                <label for="unidad_medida">Unidad de Medida:</label>
                <input type="text" id="unidad_medida" name="unidad_medida" value="<?php echo $materiaPrima->getUnidadMedida(); ?>" required>

                <label for="fecha_adquisicion">Fecha de Adquisición:</label>
                <input type="date" id="fecha_adquisicion" name="fecha_adquisicion" value="<?php echo $materiaPrima->getFechaAdquisicion(); ?>" required>

                <label for="nivel_minimo">Nivel Mínimo:</label>
                <input type="number" id="nivel_minimo" name="nivel_minimo" value="<?php echo $materiaPrima->getNivelMinimo(); ?>" required>

                <button type="submit">Actualizar</button>
                <a href="materia_prima.php?action=index">Cancelar</a>
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
        $materiaPrima = $controller->ver($id);
        if (!$materiaPrima) {
            echo "Materia prima no encontrada.";
            exit();
        }
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles de la Materia Prima</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <h1>Detalles de la Materia Prima</h1>
            <p><strong>ID:</strong> <?php echo $materiaPrima->getId(); ?></p>
            <p><strong>Tipo:</strong> <?php echo $materiaPrima->getTipo(); ?></p>
            <p><strong>Cantidad:</strong> <?php echo $materiaPrima->getCantidad(); ?></p>
            <p><strong>Unidad de Medida:</strong> <?php echo $materiaPrima->getUnidadMedida(); ?></p>
            <p><strong>Fecha de Adquisición:</strong> <?php echo $materiaPrima->getFechaAdquisicion(); ?></p>
            <p><strong>Nivel Mínimo:</strong> <?php echo $materiaPrima->getNivelMinimo(); ?></p>
            <a href="materia_prima.php?action=index">Volver a la lista</a>
            <footer>
                <p>&copy; <?php echo date("Y"); ?> Textil_Smart</p>
            </footer>
        </body>
        </html>
        <?php
        break;

    case 'index':
    default:
        $materiasPrimas = $controller->listar();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Materias Primas</title>
            <link rel="stylesheet" href="../../public/css/estilo.css"> <!-- Asegúrate de que la ruta sea correcta -->
        </head>
        <body>
            <nav>
                <ul>
                    <li><a href="distribucion.php">Distribución</a></li>
                    <li><a href="clientes.php">Clientes</a></li>
                    <li><a href="pedidos.php">Pedidos</a></li>
                    <li><a href="produccion.php">Producción</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="proveedores.php">Proveedores</a></li>
                </ul>
            </nav>
            <h1>Lista de Materias Primas</h1>
            <a href="materia_prima.php?action=create">Agregar Materia Prima</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tipo</th>
                        <th>Cantidad</th>
                        <th>Unidad de Medida</th>
                        <th>Fecha de Adquisición</th>
                        <th>Nivel Mínimo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($materiasPrimas as $materiaPrima): ?>
                    <tr>
                        <td><?php echo $materiaPrima->getId(); ?></td>
                        <td><?php echo $materiaPrima->getTipo(); ?></td>
                        <td><?php echo $materiaPrima->getCantidad(); ?></td>
                        <td><?php echo $materiaPrima->getUnidadMedida(); ?></td>
                        <td><?php echo $materiaPrima->getFechaAdquisicion(); ?></td>
                        <td><?php echo $materiaPrima->getNivelMinimo(); ?></td>
                        <td>
                            <a href="materia_prima.php?action=show&id=<?php echo $materiaPrima->getId(); ?>">Ver</a>
                            <a href="materia_prima.php?action=edit&id=<?php echo $materiaPrima->getId(); ?>">Editar</a>
                            <a href="materia_prima.php?action=index&delete_id=<?php echo $materiaPrima->getId(); ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta materia prima?');">Eliminar</a>
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