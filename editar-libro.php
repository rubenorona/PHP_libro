<?php
include_once("funciones.php");
include_once("navbar.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_GET['isbn'])) {
    die("Error: No se proporcionó un ISBN.");
}

$libro = obtenerLibrosPorId($_GET['isbn']);

if (!is_array($libro)) {
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Libro</h1>
        <form action="actualizar-libro.php" method="POST">
            <input type="hidden" name="isbn" value="<?php echo $libro['isbn']; ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo htmlspecialchars($libro['titulo']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" name="autor" value="<?php echo htmlspecialchars($libro['autor']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año</label>
                <input type="number" class="form-control" name="anio" value="<?php echo htmlspecialchars($libro['anio']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="genero_id" class="form-label">Género ID</label>
                <input type="text" class="form-control" name="genero_id" value="<?php echo htmlspecialchars($libro['genero_id']); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar Libro</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
