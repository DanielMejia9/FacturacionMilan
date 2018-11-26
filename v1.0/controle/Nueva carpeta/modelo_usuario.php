<?php
require("conexion.php");
	$nom_usu = $_POST["nom_usu"];
	$ape_usu  = $_POST["ape_usu"];
	$ced_usu  = $_POST["ced_usu"];
	$car_usu  = $_POST["car_usu"];
	$pass_usu = md5(trim($_POST["pass_usu"])); 
	$per_usu  = $_POST["per_usu"];
	


$selec = mysql_query('SELECT ced_usuario FROM tb_user_reg');
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
			location.href = "http://localhost/admin/registro_usuario.php";
		</script>
		<?php	
		
	}
	else{
		
		?>
		<script language="javascript">
		alert("Este usuario ya ha sido registrado");
		location.href = "http://localhost/admin/registro_usuario.php";
		</script>
		<?php	
		
	}
}
?>