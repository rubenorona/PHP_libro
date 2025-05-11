<?php
include_once("funciones.php");
include_once("navbar.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // Verificar que los datos existen antes de pasarlos
    if (isset($_POST['ISBN'], $_POST['Titulo'], $_POST['Autor'], $_POST['Año'], $_POST['Genero_ID'])) {
        $nuevoLibro = [
            'isbn' => $_POST['ISBN'],
            'titulo' => $_POST['Titulo'],
            'autor' => $_POST['Autor'],
            'anio' => $_POST['Año'],
            'genero_id' => $_POST['Genero_ID']
        ];

        $mensaje = añadirLibros($nuevoLibro);
        echo "Mensaje: " . $mensaje; // Mostrar el mensaje antes de redirigir

        // Redirigir si todo fue exitoso
        header("Location: index.php?mensaje=" . urlencode($mensaje));
        exit();
    } else {
        echo "Error: Datos incompletos.";
    }
}
?>
