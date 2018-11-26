<?php
require("conexion.php");

	
	$cod_uniClie = $_POST["cod_uniClie"];	
	$modi = mysql_query("DELETE FROM tb_regi_cli  WHERE codi_clie ='".$cod_uniClie."'");



?>
		<script language="javascript">
		alert("Registro eliminado exitosamente");
		window.location.href = "/admin/cliente/registro_cliente.php";
		</script>
		<?php







/*$selec = mysql_query('SELECT ced_usuario FROM tb_user_reg');
if($col = mysql_fetch_array($selec)){

	if(!($col['ced_usuario'] == $ced_usu))
	{
		//Almacena en la base de datos los datos del usuario
		mysql_query
		('INSERT INTO tb_user_reg (nom_usuario, ape_usuario, ced_usuario, car_usuario, password, tip_usuario)
		VALUES
		(\''.$nom_usu.'\',\''.$ape_usu.'\',\''.$ced_usu.'\',\''.$car_usu.'\',\''.$pass_usu.'\',\''.$per_usu.'\')')or die(mysql_error());
		
		?>	
		<script language="javascript">
			alert("Usuario registrado sastifactoriamente");
			location.href = "http://localhost/retencion/registro_usuario.php";
		</script>
		<?php	
		
	}
	else{
		
			
		
	}
}*/
?>