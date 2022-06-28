<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN de boostraps: Libreria de estilos SCSS y CSS para darle unas buena apariencia a la aplicacion
    para mas informacion buscar documentacion de boostraps en: https://getbootstrap.com/docs/4.3/getting-started/introduction/ -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>COOSUR</title>
</head>
<body>
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



$result = mysqli_query($conn, $query);

if($result){
    header ("Location: gremio.php");      
}else{

?>

<div class="alert alert-danger" role="alert">
  Ha ocurrido un error al intentar crear el gremio 
  <?php
    echo mysqli_error($conn);
  ?>
  <a href="../gremio/gremio.php"><button type="button" class="btn btn-success">Regresar</button></a>
</div>

<?php
}



?>

</body>
</html>