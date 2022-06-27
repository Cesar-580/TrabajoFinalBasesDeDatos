<?php
 

// Llamado de la conexión de la BD
require('../conexion/conexion.php');

// Consulta (query)

// $n_id = $_POST[n_id];
// $p_nombre = $_POST[p_nombre];
// $s_nombre = $_POST[s_nombre];
// $p_ape = $_POST[p_ape];
// $s_ape = $_POST[s_ape];
// $f_nac = $_POST[f_nac];
// $f_exp = $_POST[f_exp];
// $tel = $_POST[tel];
// $t_sangre = $_POST[t_sangre];
// $salario = $_POST[salario];




if ($_POST['gre_aso'] != ""){
    $gre_aso = $_POST['gre_aso'] ;
}else{
    $gre_aso = NULL;
}

if ($_POST['empre_r'] != ""){
    $empre_r = $_POST['empre_r'] ;
}else{
    $empre_r = NULL;
}

// $gre_aso = $_POST[gre_aso];
// $empre_r = $_POST[empre_r];



$query="INSERT INTO `chofer`(
    `numero_identificacion`,
    `primer_nombre`,
    `segundo_nombre`,
    `primer_apellido`,
    `segundo_apellido`,
    `fecha_de_naciemiento`,
    `fecha_expiracion_pase`,
    `telfono_celular`,
    `tipo_sangre`,`salario`,
    `id_gremio`,
    `id_empresa_rival`
    )
VALUES (
    $_POST[n_id],
    '$_POST[p_nombre]',
    '$_POST[s_nombre]',
    '$_POST[p_ape]',
    '$_POST[s_ape]',
    '$_POST[f_nac]',
    '$_POST[f_exp]',
    $_POST[tel],
    '$_POST[t_sangre]',
    $_POST[salario],
    " . (isset($gre_aso) ? "'$gre_aso'" : "NULL") . ",
    " . (isset($empre_r) ? "'$empre_r'" : "NULL") . "
    )";



$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

if($result){
    header ("Location: chofer.php");
    
        
}else{
    echo "Ha ocurrido un error al crear la persona";
}

``


?>