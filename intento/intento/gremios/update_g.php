<?php
 
// Create connection
require('../configuraciones/configuraciones.php');

//query
$query="UPDATE gremio SET ced_presidente='$_POST[ced_presidente]',telefono='$_POST[telefono]' WHERE nombre='$_POST[nombre]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: gremio.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>