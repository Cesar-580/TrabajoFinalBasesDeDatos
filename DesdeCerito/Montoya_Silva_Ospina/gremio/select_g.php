<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

// Consulta (query)

$query="SELECT * FROM gremio";
$resultG = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 

 
mysqli_close($conn);

?>