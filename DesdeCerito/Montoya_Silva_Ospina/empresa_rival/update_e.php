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



$query = "UPDATE empresa SET 
nombre = '$_POST[nombre]',
valor_en_bitcoins_de_la_empresa = '$_POST[valo_bit]'
WHERE NIT='$_POST[NIT]'
";

$gre_aso = $_POST['gre_aso'] ;


if ($_POST['gre_aso'] == "Ninguno"){
    $query2 = "UPDATE empresa SET id_gremio = NULL WHERE NIT='$_POST[NIT]'";
}else{
    // echo 'SOY algo'.$_POST['gre_aso'];
    $query2 = "UPDATE empresa SET id_gremio = '$gre_aso' WHERE NIT='$_POST[NIT]'";
}



    
// $sql = "UPDATE document SET date_session = '".(($mod_date_session)?$mod_date_session:NULL)."' WHERE id = $id";

$result = mysqli_query($conn, $query) ;

$result2 = mysqli_query($conn, $query2) ;

if($result AND $result2){
    header ("Location: empresa.php");
    
     
}else{

    ?>
    
    <div class="alert alert-danger" role="alert">
      Ha ocurrido un error al actualizar la empresa 
      <?php
        echo mysqli_error($conn);
      ?>
      <a href="../empresa_rival/empresa.php"><button type="button" class="btn btn-success">Regresar</button></a>
    </div>
    
    <?php
    }
    
    
    
    mysqli_close($conn);
    ?>
    </body>
</html>

