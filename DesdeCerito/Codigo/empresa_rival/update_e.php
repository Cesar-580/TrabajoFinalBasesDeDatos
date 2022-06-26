<?php
 

// Llamado de la conexión de la BD
require('../conexion/conexion.php');


// Consulta (query)



$query = "UPDATE empresa SET 
nombre = '$_POST[nombre]',
valor_en_bitcoins_de_la_empresa = '$_POST[valo_bit]'
WHERE NIT='$_POST[NIT]'
";

$gre_aso = $_POST['gre_aso'] ;


if ($_POST['gre_aso'] == "Ninguno"){
    $query2 = "UPDATE empresa SET id_gremio = NULL WHERE NIT='$_POST[NIT]'";
}else{
    echo 'SOY algo'.$_POST['gre_aso'];
    $query2 = "UPDATE empresa SET id_gremio = '$gre_aso' WHERE NIT='$_POST[NIT]'";
}



    
// $sql = "UPDATE document SET date_session = '".(($mod_date_session)?$mod_date_session:NULL)."' WHERE id = $id";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

if($result){
    header ("Location: empresa.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }


mysqli_close($conn);

?>