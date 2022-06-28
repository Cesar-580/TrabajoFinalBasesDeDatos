<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');


// Consulta (query)


// echo $_POST['numero_identificacion'];

// $query = "DELETE FROM chofer WHERE numero_identificacion='$_POST['numero_identificacion']'";

$numero_identificacion = $_POST['numero_identificacion'];

echo $numero_identificacion;

$query = "DELETE FROM chofer WHERE numero_identificacion= $numero_identificacion";
$result_cd = mysqli_query($conn, $query) or die(mysqli_error($conn));




if($result_cd){
    header ("Location: chofer.php");
    
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);

?>