<?php
	require("conexion.php");
	//Obtiene el valor de lo selecciona en el </selecte>
	$codigo = $_POST["valSelect"];
	//Redirreccionamos el valor obtiene del la seleccion
	header('Location: ../facturacion/facturacion.php?valor='.$codigo.'');
	
	

?>