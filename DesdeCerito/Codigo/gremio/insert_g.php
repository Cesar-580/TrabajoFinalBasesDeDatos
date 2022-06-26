<?php
 

// Llamado de la conexión de la BD
require('../conexion/conexion.php');


$query="INSERT INTO `gremio`(
    `nombre_gremio`,
    `ced_presidente_gremio`,
    `telefono_del_gremio`
    )
VALUES (
    '$_POST[nombre_gre]',
    '$_POST[ced_presi]',
    '$_POST[telf_pre]'
    )";



$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result){
    header ("Location: gremio.php");
    
        
}else{
    echo "Ha ocurrido un error al crear el gremio";
}

``


?>