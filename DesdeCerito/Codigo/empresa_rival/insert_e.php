<?php
 

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

echo $_POST['gre_aso'];
echo "<br>";

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
    '$_POST[gre_aso]'
    )";



$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result){
    header ("Location: empresa.php");
    
        
}else{
    echo "Ha ocurrido un error al crear la persona";
}

``


?>