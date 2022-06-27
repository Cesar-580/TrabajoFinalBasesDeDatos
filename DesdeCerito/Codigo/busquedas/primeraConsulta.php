<?php

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

$query = "SELECT DISTINCT NIT,nombre 
FROM empresa
WHERE 
empresa.id_gremio IS NOT NULL AND empresa.id_gremio NOT IN (SELECT id_gremio FROM chofer) AND NIT IN (
    SELECT chofer.id_empresa_rival FROM chofer
	GROUP BY chofer.id_empresa_rival
    HAVING SUM(chofer.salario)> 1000 AND COUNT(*)>=3
	);";

$resultC1 = mysqli_query($conn, $query) or die(mysqli_error($conn));

mysqli_close($conn);

?>