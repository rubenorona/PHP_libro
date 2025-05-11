
<?php
// Configuración de la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'diana_otero_bd';
$table_name_libro = "libro";

try {
    $conexion = mysqli_connect($host, $user, $password, $database);
  
    // msqli_query($conexion, "create table...");

    //Consultar datos
    $results = mysqli_query($conexion,"select * from $database.$table_name_libro");

    while ($libro =  mysqli_fetch_array($results, MYSQLI_ASSOC)) {
  
    }

    mysqli_free_result($results);
    mysqli_close($conexion);
   
} catch (Exception $e) {
  echo 'Ocurrio un error' . $e->getMessage();
}
