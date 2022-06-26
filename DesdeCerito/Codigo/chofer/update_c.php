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

if ($_POST['p_bus'] != ""){
    // echo "Exito B <br>";
    $p_bus = $_POST['p_bus'] ;
    // echo $p_bus;
}else{
    $p_bus = NULL;
}

if ($_POST['p_taxi'] != ""){
    // echo "Exito T <br>";
    $p_taxi = $_POST['p_taxi'] ;
}else{
    $p_taxi = NULL;
}

echo $p_bus."-BUS<br>";
echo $p_taxi."-TAXI<br>";


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

echo 'TODO BONIT';

if( ($_POST['p_bus'] == "" && $_POST['p_taxi'] != "") || ($_POST['p_bus'] != "" AND $_POST['p_taxi'] == ""))
{   
    if($_POST['p_bus'] == ""){
        $query2 = "UPDATE chofer SET placa_bus = NULL, placa_taxi = '$_POST[p_taxi]' WHERE numero_identificacion='$_POST[n_id]'";
    }
    if($_POST['p_taxi'] == ""){
        $query2 = "UPDATE chofer SET placa_bus ='$_POST[p_bus]',placa_taxi = NULL WHERE numero_identificacion='$_POST[n_id]'"; 
    }
}else{
    header ("Location: chofer.php?error");
}
echo '<br>TODO BONIT q3';
if($_POST['empre_r'] == ""){
    $query3 = "UPDATE chofer SET id_empresa_rival = NULL WHERE numero_identificacion='$_POST[n_id]'"; 
}else{
    $query3 = "UPDATE chofer SET id_empresa_rival ='$_POST[empre_r]' WHERE numero_identificacion='$_POST[n_id]'"; 
}
echo '<br>TODO BONIT q4';
if($_POST['gre_aso'] == ""){
    $query4 = "UPDATE chofer SET id_gremio = NULL WHERE numero_identificacion='$_POST[n_id]'"; 
}else{
    $query4 = "UPDATE chofer SET id_gremio ='$_POST[gre_aso]' WHERE numero_identificacion='$_POST[n_id]'"; 
}
echo '<br>TODO BONITo FIN<br>';
    
// $sql = "UPDATE document SET date_session = '".(($mod_date_session)?$mod_date_session:NULL)."' WHERE id = $id";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
echo '<br>TODO BONITo Result <br>';
$result2 = mysqli_query($conn, $query2) or die(mysqli_error($conn));

$result3 = mysqli_query($conn, $query3) or die(mysqli_error($conn));

$result4 = mysqli_query($conn, $query4) or die(mysqli_error($conn));
 
if($result){
    header ("Location: chofer.php");
    
     
 }else{
     echo "Ha ocurrido un error al Eliminar  la persona";
 }
 
mysqli_close($conn);



?>