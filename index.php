<?php
include_once("funciones.php");
include_once("navbar.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

$mensaje = "";

// Verificar si hay una acción en la solicitud
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'añadir':
                $mensaje = añadirLibros($_POST);
                break;
            case 'actualizar':
                $mensaje = actualizarLibros($_POST);
                break;
            case 'eliminar':
                $mensaje = isset($_POST['ISBN']) ? eliminarLibros($_POST['ISBN']) : "Error: Se necesita el ISBN para eliminar.";
                break;
            case 'obtener_por_id':
                $mensaje = isset($_POST['ISBN']) ? obtenerLibrosPorId($_POST['ISBN']) : "Error: Se necesita el ISBN.";
                break;
        }
    }
}

// Obtener libros de la base de datos
$libros = obtenerLibros();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi Librería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluir la fuente Lobster de Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    
    <div class="container mt-5">
        <h1 class="mb-4">Lista de libros</h1>

        <!-- Botón para ir al formulario de creación -->
        <div class="mb-3">
            <a href="crear-libro.php" class="btn btn-success">Añadir Nuevo Libro</a>
        </div>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Género ID</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($libros); $i++) {
                    $l = $libros[$i];
                    echo "<tr>";
                    echo "<td>{$l['isbn']}</td>";
                    echo "<td>{$l['titulo']}</td>";
                    echo "<td>{$l['autor']}</td>";
                    echo "<td>{$l['anio']}</td>";
                    echo "<td>{$l['genero_id']}</td>";
                    echo "<td>
                    <a href='editar-libro.php?isbn={$l['isbn']}' class='btn btn-warning btn-sm'>Editar</a>
                    <a href='eliminar-libro.php?isbn={$l['isbn']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este libro?\");'>Eliminar</a>
                        </td>"; 
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>