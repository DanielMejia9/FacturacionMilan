<?php
require("conexion.php");

	
	$cod_uniClie = $_POST["cod_uniClie"];	

	$modi = mysql_query("DELETE FROM tb_categorias_productos  WHERE id_categoria ='".$cod_uniClie."'");



?>
		<script language="javascript">
		alert("Registro eliminado exitosamente");
		window.location.href = "/productos/registro_categoria.php";
		</script>
		<?php
?>