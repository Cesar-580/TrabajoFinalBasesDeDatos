<?php
 
// Create connection
require('../configuraciones/configuraciones.php');

//query
$query="SELECT * FROM gremio";
$result = mysqli_query($conn, $query) or 
die(mysqli_error($conn));
 

 
mysqli_close($conn);



?>
