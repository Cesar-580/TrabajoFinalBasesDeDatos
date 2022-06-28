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


// Consulta (query)


$query = "UPDATE gremio SET 
nombre_gremio = '$_POST[nombre_gre]',
ced_presidente_gremio = '$_POST[ced_presi]',
telefono_del_gremio = '$_POST[telf_pre]'

WHERE nombre_gremio='$_POST[nombre_gre]'
";

    
// $sql = "UPDATE document SET date_session = '".(($mod_date_session)?$mod_date_session:NULL)."' WHERE id = $id";

$result = mysqli_query($conn, $query);

if($result){
    header ("Location: gremio.php");
    
     
}else{

    ?>
    
    <div class="alert alert-danger" role="alert">
      Ha ocurrido un error al actualizar el gremio 
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