<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');


// Consulta (query)


// echo $_POST['numero_identificacion'];

// $query = "DELETE FROM chofer WHERE numero_identificacion='$_POST['numero_identificacion']'";

$nombre_gremio = $_POST['nombre_gremio'];

echo $nombre_gremio;
echo "<br>";

$query = "DELETE FROM gremio WHERE nombre_gremio= '$nombre_gremio'";
$result_gd = mysqli_query($conn, $query) or die(mysqli_error($conn));




if($result_gd){
    header ("Location: gremio.php");
    
 }else{
     echo "Ha ocurrido un error al Eliminar el gremio";
 }
 
mysqli_close($conn);

?>