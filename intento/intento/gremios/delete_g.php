<?php
 
// Create connection
require('../configuraciones/configuraciones.php');

//query
$query="delete FROM gremio where nombre='$_POST[d]'";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 
if($result){
    header ("Location: gremio.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>