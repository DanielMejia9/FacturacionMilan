<?php
require("conexion.php");
include("start.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<title>Registro del Cliente</title>
</head>
<body>
<div id="linea2">
	<?php
			if (isset($_SESSION['k_username'])) 
						{
							echo '<img src="present.png" width="120" border="0" align="center" title="Sistema Automatizado Jireh Pro"/>';
							echo (' Usuario: '.$_SESSION['k_username']);
							echo '
								<table align="right">
									<tr>
										<td>&#124
											<a href="modulo.php">Pagina Principal</a>&#124
											
										</td>
										<td>
											<a href="logout.php">Salir</a>&#124
										</td>
								   </tr>
							   </table>';	
								}else{
										echo ' <form action="validar.php" name="" method="post" >
											<table align="right" border="0">
											<tr>
												<td>
													Usuario: <input type="text" name="usuario" size="15" maxlength="30"/>
													Contrase&ntildea: <input type="password"  name="password" size="15" maxlength="30"/>
													<input type="submit" value="Entrar" />
												</td>
											</tr>
											</table>
										 </form>';
										 echo '<img src="present.png" width="120" border="0" align="center" title="Sistema Automatizado Jireh Pro"/>';
										}
	   ?>


</div>
<div id="cuerpo_interno">
<?php
//almacenos en una variable el post de formulario
$buscar = $_POST["buscar"];
$rif = $_POST["rif_cliente"];
$cliente = $_POST["cliente"];
$sleccionar = mysql_query('SELECT * FROM registro_de_cliente WHERE nom_empresa = \''.$cliente.'\'');
$columna = mysql_fetch_array($sleccionar);
$comprobar = $rif == NULL| $cliente == NULL;


if (isset($_SESSION['k_username'])){
if(isset($buscar)){
	if ($comprobar)
	{
		?>
        <script language="javascript1.2">
		alert ("Campo Vacio");
		location.href = "buscar_calculo.php";
		</script>
        <?php
	}
	if ($columna["rif_empresa"] == $rif){
		$cod = $columna ["cod_clientes"];
		$empresa = $columna ["nom_empresa"];
		$rif = $columna ["rif_empresa"];
		$dir = $columna ["dir_empresa"];
		$cont = $columna ["cont_especial"];
		$fecha = $columna ["fecha"];
		//echo $columna ["fecha"];
		//echo $rif;
		echo '
				<form  method="post" action="imprimir_calculo.php"><br>
				<table align="center" border="0" width="" class="colorInput">
						<tr>
							<td align="left">Codigo:</td>
							<td><input type="text" name ="codigo" value="'.$cod.'"></td>
							<td align="left">Nombre del Cliente:</td>
							<td><input type="text" name="empresa" value="'.$empresa.'"></td>
							<td align="left">Direccion:</td>
							<td><input type="text" name="direccion" value="'.$dir.'"></td>
						</tr>
						<tr>
							<td align="left">RIF:</td>
							<td><input type="text"  name="rif" value="'.$rif.'"></td>
							<td align="left">Contribuyente:</td>
							<td><input type="text" name="cont" value="'.$cont.'"></td>
							<td align="left">Fecha:</td>
							<td><input type="text" name="fecha" value="'.$fecha.'"></td>
						</tr>
						<tr>
							<td align="right" colspan="3">Monto de la Factura:</td>
							<td align="left" colspan="3"><input type="text" name="monto">Bsf.</td>
						</tr>
						<tr>
							<td align="center" colspan="3"><input type="submit" value="Calcular" name="calcular"></td>
							<td align="center" colspan="3"><input type="reset" value="Limpiar"></td>
						</tr>
				</table> 
			</form>
		
		';
		}
	else
	{
		?>
        <script language="javascript1.2">
		alert ("Verifique el numero de RIF");
		location.href = "buscar_calculo.php";
		</script>
        <?php
	}
	
	
	}
}
?>



</div>
</body>
</html>