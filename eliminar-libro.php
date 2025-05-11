<?php
include_once("funciones.php");
include_once("navbar.php");

if (isset($_GET['isbn'])) {
    $mensaje = eliminarLibros($_GET['isbn']);
    header("Location: index.php?mensaje=" . urlencode($mensaje));
    exit();
}
?>