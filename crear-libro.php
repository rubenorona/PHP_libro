<?php
include_once("navbar.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/styles.css">

</head>

<body>

    <div class="container mt-5">
        <h1 class="mb-4 text-center">Crear Nuevo Libro</h1>

        <!-- Formulario con clases de Bootstrap -->
        <form action="guardar-libro.php" method="POST" class="p-4 border rounded shadow bg-light">
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="ISBN" placeholder="Introduce el ISBN" required>
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="Titulo" placeholder="Introduce el título" required>
            </div>
            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" class="form-control" id="autor" name="Autor" placeholder="Introduce el autor" required>
            </div>
            <div class="mb-3">
                <label for="anio" class="form-label">Año de publicación</label>
                <input type="number" class="form-control" id="anio" name="Año" placeholder="Ejemplo: 2024" required>
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select class="form-select" id="genero" name="Genero_ID" required>
                    <option selected disabled>Selecciona un género</option>
                    <option value="1">Ciencia ficción</option>
                    <option value="2">Acción</option>
                    <option value="3">Thriller</option>
                </select>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Guardar Libro</button>
                <a href="index.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>