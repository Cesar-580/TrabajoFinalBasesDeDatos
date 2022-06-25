<?php
 
// Create connection
require('../configuraciones/configuraciones.php');

$cedula = $_POST["telefono"];

//query
if($cedula<0){
	echo "cedula debe ser positiva";
}

else{
	$query="INSERT INTO `gremio`(`nombre`,`ced_presidente`, `telefono`)
 	VALUES ('$_POST[nombre]','$_POST[name]','$_POST[telefono]')";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

 	if($result){
        header ("Location: gremio.php");
        
         
 	}else{
 		echo "Ha ocurrido un error al crear la persona";
 	}


}

?>