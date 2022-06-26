<?php
 

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

echo $_POST['gre_aso'];
echo "<br>";

if ($_POST['gre_aso'] != "Ninguno"){
    $gre_aso = $_POST['gre_aso'] ;
}else{
    $gre_aso = NULL;
}

$query="INSERT INTO `empresa`(
    `NIT`,
    `nombre`,
    `valor_en_bitcoins_de_la_empresa`,
    `id_gremio`
    )
VALUES (
    '$_POST[nit]',  
    '$_POST[nombre_emp]',
    '$_POST[valo_bit]',
    " . (isset($gre_aso) ? "'$gre_aso'" : "NULL") . "
    )";



$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result){
    header ("Location: empresa.php");
    
        
}else{
    echo "Ha ocurrido un error al crear la persona";
}

``


?>