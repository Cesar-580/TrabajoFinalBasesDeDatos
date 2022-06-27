<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

$query2 = "SELECT DISTINCT numero_identificacion, salario
FROM chofer,gremio, empresa
WHERE
salario > gremio.telefono_del_gremio
AND
chofer.id_gremio = gremio.nombre_gremio
AND 
chofer.id_empresa_rival = empresa.NIT
AND
empresa.id_gremio = chofer.id_gremio
;";

$resultC2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));


mysqli_close($conn);
?>