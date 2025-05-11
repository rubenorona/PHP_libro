<?php
include_once("funciones.php");
include_once("navbar.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // var_dump($_POST);

    $libroActualizado = [
        'isbn' => $_POST['isbn'],
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'anio' => $_POST['anio'],
        'genero_id' => $_POST['genero_id']
    ];

    // Depuración: Verificar contenido antes de llamar la función
    $mensaje = actualizarLibros($libroActualizado);
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit();

   }
?>
