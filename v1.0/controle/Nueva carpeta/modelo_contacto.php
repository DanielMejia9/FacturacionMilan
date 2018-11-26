<?php
require("conexion.php");
	$nom_usu = $_POST["nom_cont"];
	$ape_usu  = $_POST["ape_cont"];
	$eda_cont  = $_POST["eda_cont"];
	$tel_cont_local  = $_POST["tel_cont_local"];
	$tel_cont_cel = $_POST["tel_cont_cel"];
	$dir_cont = $_POST["dir_cont"];
	$que_cont = $_POST["que_cont"];
	$cor_cont = $_POST["cor_cont"];
	//$pass_usu = md5(trim($_POST["pass_usu"])); 
	//$per_usu  = $_POST["per_usu"];
	echo  $nom_usu.$ape_usu.$eda_cont.$tel_cont_local.$tel_cont_cel.$dir_cont.$que_cont.$cor_cont;


//$selec = mysql_query('SELECT ced_usuario FROM tb_user_reg');
//if($col = mysql_fetch_array($selec)){

	//if(!($col['ced_usuario'] == $ced_usu))
	//{
		//Almacena en la base de datos los datos del usuario
		mysql_query
		('INSERT INTO tb_cont_agen (NOM_CONT, APE_CONT, EDA_CONT, TEL_CONT_LOC, TEL_CONT_CEL, DIR_CONT, GUS_CONT_HAC, COR_CONT)
		VALUES
		(\''.$nom_usu.'\',\''.$ape_usu.'\',\''.$eda_cont.'\',\''.$tel_cont_local.'\',\''.$tel_cont_cel.'\',\''.$dir_cont.'\', \''.$que_cont.'\',\''.$cor_cont.'\')')or die(mysql_error());
		
		?>	
		<script language="javascript">
			alert("Usuario registrado sastifactoriamente");
			location.href = "http://localhost/admin/registro_contacto.php";
		</script>
		<?php	
		
	/*}
	else{
		
		?>
		<script language="javascript">
		alert("Este usuario ya ha sido registrado");
		location.href = "http://localhost/retencion/registro_usuario.php";
		</script>
		<?php	
		
	}
}*/
?>