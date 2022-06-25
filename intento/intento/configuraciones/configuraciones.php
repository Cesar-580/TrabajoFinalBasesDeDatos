<?php
$host = "localhost";
$user = "Trabajo_Final";
$pass = "TrabajoBasesDatos";
$DB = "trabajo_final";
$conn = new mysqli($host, $user, $pass, $DB) or die("Error al conectar a la DB " . mysqli_error($link));
?>