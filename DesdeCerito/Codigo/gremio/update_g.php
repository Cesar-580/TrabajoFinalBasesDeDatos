<?php
 

// Llamado de la conexión de la BD
require('../conexion/conexion.php');


// Consulta (query)


$query = "UPDATE gremio SET 
nombre_gremio = '$_POST[nombre_gre]',
ced_presidente_gremio = '$_POST[ced_presi]',
telefono_del_gremio = '$_POST[telf_pre]'

WHERE nombre_gremio='$_POST[nombre_gre]'
";

    
// $sql = "UPDATE document SET date_session = '".(($mod_date_session)?$mod_date_session:NULL)."' WHERE id = $id";

$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));

if($result){
    header ("Location: gremio.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }


mysqli_close($conn);

?>