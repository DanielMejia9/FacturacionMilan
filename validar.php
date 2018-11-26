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

$result = mysql_query('SELECT A.password, A.nom_usuario, A.ape_usuario, A.tip_usuario, B.nombre_emp,B.nregistro_emp, B.imglogo_emp FROM tb_user_reg as A inner join tb_config as B on A.id_config  = B.id_config WHERE nom_usuario=\''.$usuario.'\'');

//Consultamos la tabla clientes
$result2 = mysql_query('SELECT codi_clie, cedula, nomb_clie, ape_clie, password
												FROM tb_regi_cli 
												WHERE nomb_clie=\''.$usuario.'\'');

	if($row = mysql_fetch_array($result)){
		if($row["password"] == $password){
			$esp =" ";
			$_SESSION["k_username"] =$row['nom_usuario'].$esp.$row['ape_usuario'].$esp;
			$_SESSION["id"] =$row['nom_usuario'];
			$_SESSION["tipo"] = $row['tip_usuario'];
			$_SESSION["logo"] = $row['imglogo_emp'];
			$_SESSION["empresa"] = $row['nombre_emp'];
			?>
			<SCRIPT LANGUAGE="javascript">
				location.href = "modulo.php";
			</SCRIPT>
			<?php
		}
	}
	//Si la consulta a la tabla user no devuelve nada, verificamos la consulta a la tabla clientes
	elseif($file = mysql_fetch_array($result2)) {
		if ($file["password"] == $password) {
			$_SESSION["username"] =$row['nomb_clie'].$esp.$row['ape_clie'].$esp;
			$_SESSION["id"] =$row['cedula'];
			$_SESSION["fecha"] = $row['fech_clie'];
			$_SESSION["direccion"] = $row['dire_clie'];
			$_SESSION["telefono1"] = $row['tele_clie'];
			$_SESSION["telefono1"] = $row['tele_clie_opci'];
			?>
			<SCRIPT LANGUAGE="javascript">
				location.href = "clientes.php";
			</SCRIPT>
			<?php
		}
	}
	else
	{
		?>
			<SCRIPT LANGUAGE="javascript">
				alert ("Verifique su cuenta y su contrase�a");
				location.href = "index.php";
			</SCRIPT>
		<?php	
	}
mysql_free_result($result);
mysql_free_result($result2);
mysql_close();
?>
