<?php
$host = "localhost:3308";
$user = "Cesar";
$pass = "cesarinm580";
$DB = "prueba3";
$conn = new mysqli($host, $user, $pass, $DB) or die("Error al conectar a la DB " . mysqli_error($link));
?>