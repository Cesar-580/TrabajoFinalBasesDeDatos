<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');


// Consulta (query)


// echo $_POST['numero_identificacion'];

// $query = "DELETE FROM chofer WHERE numero_identificacion='$_POST['numero_identificacion']'";

$NIT = $_POST['NIT'];

echo $NIT;

$query = "DELETE FROM empresa WHERE NIT= $NIT";
$result_ed = mysqli_query($conn, $query) or die(mysqli_error($conn));




if($result_ed){
    header ("Location: empresa.php");
    
 }else{
     echo "Ha ocurrido un error al Eliminar  la empresa";
 }
 
mysqli_close($conn);

?>