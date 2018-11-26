<?php
require("conexion.php");

	
	$cod_uniClie = $_POST["cod_uniClie"];	
	$modi = mysql_query("DELETE FROM tb_regi_cli  WHERE codi_clie ='".$cod_uniClie."'");



?>
		<script language="javascript">
		alert("Registro eliminado exitosamente");
		window.location.href = "/cliente/registro_cliente.php";
		</script>
		<?php
?>