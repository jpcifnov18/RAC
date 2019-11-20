
<?php
$Conexion = new mysqli("localhost","root","","RAC");

if($Conexion -> connect_errno){
 		die("Error en la conexion: (". $Conexion -> mysqli_connect_errno(). (")"). $Conexion ->mysqli_connect_error());
 	}
?>


