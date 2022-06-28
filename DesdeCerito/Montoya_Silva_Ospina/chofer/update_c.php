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

// $n_id = $_GET[n_id];
// $p_nombre = $_GET[p_nombre];
// $s_nombre = $_GET[s_nombre];
// $p_ape = $_GET[p_ape];
// $s_ape = $_GET[s_ape];
// $f_nac = $_GET[f_nac];
// $f_exp = $_GET[f_exp];
// $tel = $_GET[tel];
// $t_sangre = $_GET[t_sangre];
// $salario = $_GET[salario];



// $gre_aso = $_GET[gre_aso];
// $empre_r = $_GET[empre_r];



// $query = "UPDATE chofer SET primer_nombre='$_POST[p_nombre]',
// segundo_nombre='$_POST[s_nombre]',
// primer_apellido='$_POST[p_ape]',
// segundo_apellido='$_POST[s_ape]',
// fecha_de_naciemiento='$_POST[f_nac]',
// fecha_expiracion_pase='$_POST[f_exp]',
// telfono_celular='$_POST[tel]',
// tipo_sangre='$_POST[t_sangre]',
// salario='$_POST[salario]',
// id_empresa_rival='$_POST[empre_r]',
// placa_bus = '$_POST[p_bus]',
// placa_taxi = NULL,
// id_gremio='$_POST[gre_aso]' 
// WHERE numero_identificacion='$_POST[n_id]'
// ";

$query = "UPDATE `chofer` SET 
`primer_nombre`='$_POST[p_nombre]',
`segundo_nombre`='$_POST[s_nombre]',
`primer_apellido`='$_POST[p_ape]',
`segundo_apellido`='$_POST[s_ape]',
`fecha_de_naciemiento`='$_POST[f_nac]',
`fecha_expiracion_pase`='$_POST[f_exp]',
`telfono_celular`='$_POST[tel]',
`tipo_sangre`='$_POST[t_sangre]',
`salario`='$_POST[salario]'

WHERE numero_identificacion='$_POST[n_id]'
";



if($_POST['empre_r'] == ""){
    $query3 = "UPDATE chofer SET id_empresa_rival = NULL WHERE numero_identificacion='$_POST[n_id]'"; 
}else{
    $query3 = "UPDATE chofer SET id_empresa_rival ='$_POST[empre_r]' WHERE numero_identificacion='$_POST[n_id]'"; 
}

if($_POST['gre_aso'] == ""){
    $query4 = "UPDATE chofer SET id_gremio = NULL WHERE numero_identificacion='$_POST[n_id]'"; 
}else{
    $query4 = "UPDATE chofer SET id_gremio ='$_POST[gre_aso]' WHERE numero_identificacion='$_POST[n_id]'"; 
}

    
// $sql = "UPDATE document SET date_session = '".(($mod_date_session)?$mod_date_session:NULL)."' WHERE id = $id";

$result = mysqli_query($conn, $query);



$result3 = mysqli_query($conn, $query3) ;

$result4 = mysqli_query($conn, $query4) ;
 
if($result){
    header ("Location: chofer.php");
    
     
}else{

    ?>
    
    <div class="alert alert-danger" role="alert">
      Ha ocurrido un error al actualizar al chofer
      <?php
        echo mysqli_error($conn);
      ?>
      <a href="../chofer/chofer.php"><button type="button" class="btn btn-success">Regresar</button></a>
    </div>
    
    <?php
    }
    
    
    
    mysqli_close($conn);
    ?>
    </body>
</html>