<?php
require("conexion.php");

	
	$cod_uniClie = $_POST["cod_uniClie"];	
	$modi = mysql_query("DELETE FROM tb_productos  WHERE id_producto ='".$cod_uniClie."'");



?>
		<script language="javascript">
		alert("Registro eliminado exitosamente");
		window.location.href = "/productos/registro_producto.php";
		</script>
		<?php
?>