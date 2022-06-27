<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

$query = "SELECT DISTINCT NIT,nombre
FROM empresa,chofer as c 
WHERE 
    NIT IN (SELECT DISTINCT id_empresa_rival
    FROM chofer
    WHERE chofer.id_gremio IS NOT NULL AND chofer.id_empresa_rival = empresa.NIT
    GROUP BY id_empresa_rival
    HAVING SUM(salario)>1000 AND COUNT(*)>=3)
;";

$resultC1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);

?>