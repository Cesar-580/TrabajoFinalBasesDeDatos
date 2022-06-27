<?php
// Llamado de la conexión de la BD
require('../conexion/conexion.php');

echo $_POST['n'].'<br>';
// echo gettype($_POST['n2']).'<br>';

$fecha1 = DATE($_POST['n2']);
echo 'f1: '.$fecha1.'<br>';
$fecha2 = DATE($_POST['n3']);
echo 'f2: '.$_POST['n3'].'<br>';
$num = $_POST['n'];

// $queryB1 = "SELECT DISTINCT nombre_gremio,telefono_del_gremio
// FROM gremio, chofer
// WHERE chofer.id_gremio = gremio.nombre_gremio 
// AND chofer.fecha_de_naciemiento >= '2000-01-21'
// AND chofer.fecha_de_naciemiento <= '2000-06-22'
// GROUP BY chofer.id_gremio
// HAVING COUNT(*) = 2;
// ";

$queryB1 = "SELECT DISTINCT nombre_gremio,telefono_del_gremio
FROM gremio, chofer
WHERE chofer.id_gremio = gremio.nombre_gremio 
AND chofer.fecha_de_naciemiento >= '$fecha1'
AND chofer.fecha_de_naciemiento <= '$fecha2'
GROUP BY chofer.id_gremio
HAVING COUNT(*) = $num;
";

// $queryB1 = "SELECT nombre_gremio,telefono_del_gremio
// FROM gremio";

$result_b = mysqli_query($conn, $queryB1) or die(mysqli_error($conn));

// $query="SELECT * FROM gremio";
// $resultB1 = mysqli_query($conn, $query) or 
// die(mysqli_error($conn));


mysqli_close($conn);

?>

<div class="form-group">
    <table class="table border-rounded">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre del gremio</th>
                <th scope="col">Telefono del gremio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Se pregunta si hay una respuesta dicha consulta
            if($result_b){
                // Se itera por cada una de las tuplas (filas) del resultado de la consulta
                foreach($result_b as $busqueda1){                         
            ?>
            <tr>
                <td><?=$busqueda1['nombre_gremio'];?></td>
                <td><?=$busqueda1['telefono_del_gremio'];?></td>
            </tr>
            <?php
                    }
                }
            ?>
        </tbody>
        </table>

        </div>