<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

// Consulta (query)

$query="SELECT * FROM empresa";
$resultE = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 

 
mysqli_close($conn);

?>