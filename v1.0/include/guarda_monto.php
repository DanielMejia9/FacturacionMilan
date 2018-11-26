<?php
require("conexion.php");
include("start.php");


$cod = $_POST["codigo"];
$monto = $_POST["monto"];
$iva = $_POST["iva"];
$totalg = $_POST["totalg"];
$retencion = $_POST["montor"];
$total = $_POST["montop"];




$guardar = $_POST["guardar"];
if(isset($guardar)){
	mysql_query('INSERT INTO calculo (cod_cliente, subtotal, iva, totalgeneral, monto_retenido, monto_pagar, fechac)
				VALUES (\''.$cod.'\',\''.$monto.'\',\''.$iva.'\',\''.$totalg.'\',\''.$retencion.'\',\''.$total.'\', \''.date("Y-m-d").'\')')or die(mysql_error());
				?>
				<script>
				alert ("Retencion Guardada");
				location.href ="buscar_calculo.php";
				 </script>
<?php				
}