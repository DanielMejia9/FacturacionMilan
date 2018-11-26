 <?php
/*include("start.php");
require("conexion.php");*/
require_once("class/class.php");
include("start.php");
$conexion = new Conectar();
$conectar = $conexion->conecta();


function quitar($mensaje)
{
	$nopermitidos = array("'",'\\','<','>',"\"");
	$mensaje = str_replace($nopermitidos, "", $mensaje);
	return $mensaje;
}

	

	
	
$password = md5(trim($_POST["password"]));
$usuario = trim($_POST["usuario"]);

$result = mysql_query('SELECT password, nom_usuario, ape_usuario FROM tb_user_reg WHERE nom_usuario=\''.$usuario.'\'');
	if($row = mysql_fetch_array($result)){
		if($row["password"] == $password){
			
			$esp =" ";
			$_SESSION["k_username"] =$row['nom_usuario'].$esp.$row['ape_usuario'].$esp;
			$_SESSION["id"] =$row['nom_usuario'];
			
			//echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
			//echo '<a href="index.php">Index</a></p>';
			//Elimina el siguiente comentario si quieres que re-dirigir automáticamente a index.php
			/*Ingreso exitoso, ahora sera dirigido a la pagina principal.*/
			?>
			<SCRIPT LANGUAGE="javascript">
			location.href = "modulo.php";
			</SCRIPT>
			<?php
		}
		else
		{
			?>
				<SCRIPT LANGUAGE="javascript">
				
				alert ("Verifique su cuenta y su contraseña");
				location.href = "index.php";
				</SCRIPT>
			<?php	
		}
	}
	else
	{
			?>
				<SCRIPT LANGUAGE="javascript">
				
				alert ("Verifique su cuenta y su contraseña");
				location.href = "index.php";
				</SCRIPT>
			<?php
	}
	mysql_free_result($result);
mysql_close();
?>
