<?php
require("conexion.php");
	$cod_uni = $_POST["cod_uni"];
	$nom_usu = $_POST["nom_usum"];
	$ape_usu  = $_POST["ape_usum"];
	$ced_usu  = $_POST["ced_usum"];
	$car_usu  = $_POST["car_usum"];
	$pass_usu = md5(trim($_POST["pass_usum"])); 
	$per_usu  = $_POST["per_usum"];
	
$modi = mysql_query("UPDATE tb_user_reg SET nom_usuario = '".$nom_usu."', ape_usuario = '".$ape_usu."', ced_usuario = '".$ced_usu."', car_usuario = '".$car_usu."', password = '".$pass_usu."' ,tip_usuario= '".$per_usu."'     WHERE id ='".$cod_uni."'");



?>
		<script language="javascript">
		alert("Registro modificado exitosamente");
		location.href = "http://localhost/admin/registro_usuario.php";
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