<?php


function obtenerLibros()
{
    // Configuración de la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'diana_otero_bd';
    $table_name_libro = "libro";

    //Realizamos la conexion
    $conexion = mysqli_connect($host, $user, $password, $database);

    //Consultar datos
    $results = mysqli_query($conexion, "select * from $database.$table_name_libro");

    $libro = [];
    while ($fila = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
        array_push($libro, $fila);
    }

    return $libro;
}

function añadirLibros($libro)
{
    // Configuración de la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'diana_otero_bd';
    $table_name_libro = "libro";

    //Realizamos la conexion
    $conexion = mysqli_connect($host, $user, $password, $database);

    // Verificar conexión
    if (!$conexion) {
        return "Error de conexión: " . mysqli_connect_error();
    }

    //Obtener datos del formulario
    $l['isbn'] = $_POST['ISBN'];
    $l['titulo'] = $_POST['Titulo'];
    $l['autor'] = $_POST['Autor'];
    $l['anio'] = $_POST['Año'];
    $l['genero_id']  = $_POST['Genero_ID'];

    // Preparar consulta SQL de inserción
    $query = "INSERT INTO $table_name_libro (isbn, titulo, autor, anio, genero_id) VALUES ('{$l['isbn']}', '{$l['titulo']}', '{$l['autor']}', '{$l['anio']}', '{$l['genero_id']}')";

    if (mysqli_query($conexion, $query)) {
        $mensaje = "Libro añadido correctamente.";
    } else {
        $mensaje = "Error al añadir libro: " . mysqli_error($conexion);
    }

    // Cerrar conexión
    mysqli_close($conexion);
    return $mensaje;
}

function actualizarLibros($libro)
{
    // Configuración de la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'diana_otero_bd';
    $table_name_libro = "libro";

    // Conectar a la base de datos
    $conexion = mysqli_connect($host, $user, $password, $database);

    // Verificar conexión
    if (!$conexion) {
        return "Error de conexión: " . mysqli_connect_error();
    }

    // Preparar consulta SQL para actualizar el libro
    $query = "UPDATE $table_name_libro SET titulo='{$libro['titulo']}', autor='{$libro['autor']}', anio={$libro['anio']}, genero_id={$libro['genero_id']} WHERE isbn='{$libro['isbn']}'";
    //var_dump($query);
    if (mysqli_query($conexion, $query)) {
        $mensaje = "Libro actualizado correctamente.";
    } else {
        $mensaje = "Error al actualizar libro: " . mysqli_error($conexion);
    }

    // Cerrar conexión
    mysqli_close($conexion);
    return $mensaje;
}

function eliminarLibros($isbn)
{
    // Configuración de la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'diana_otero_bd';
    $table_name_libro = "libro";

    // Conectar a la base de datos
    $conexion = mysqli_connect($host, $user, $password, $database);

    // Verificar conexión
    if (!$conexion) {
        return "Error de conexión: " . mysqli_connect_error();
    }

    // Preparar consulta SQL para eliminar el libro
    $query = "DELETE FROM $table_name_libro WHERE isbn='$isbn'";

    if (mysqli_query($conexion, $query)) {
        $mensaje = "Libro eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar libro: " . mysqli_error($conexion);
    }

    // Cerrar conexión
    mysqli_close($conexion);
    return $mensaje;
}

function obtenerLibrosPorId($isbn)
{
    // Configuración de la base de datos
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'diana_otero_bd';
    $table_name_libro = "libro";

    // Conectar a la base de datos
    $conexion = mysqli_connect($host, $user, $password, $database);

    // Verificar conexión
    if (!$conexion) {
        return "Error de conexión: " . mysqli_connect_error();
    }

    $isbn = $_GET['isbn'];

    // Preparar consulta SQL para obtener el libro por ISBN
    $query = "SELECT * FROM $table_name_libro WHERE isbn='$isbn'";
    $result = mysqli_query($conexion, $query);

    if ($fila = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        mysqli_close($conexion);
        return $fila;
    } else {
        mysqli_close($conexion);
        return "Libro no encontrado.";
    }
}
