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
<title>...::JirehPro - Consulta::...</title>
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

<div id="fondoConsulta">
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
		location.href = "buscar_consulta.php";
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
			if($calculo = mysql_query('SELECT * FROM calculo WHERE cod_cliente = \''.$cod.'\''))
			{
				//if($columna2 = mysql_fetch_array($calculo))
					//{
					//	$subtotal = $columna2["subtotal"];
						//$iva = $columna2["iva"];
						//$totalg = $columna2["totalgeneral"];
						//$montor = $columna2["monto_retenido"];
						//$montop = $columna2["monto_pagar"];
						//}
				
			}
		//echo $columna ["fecha"];
		//echo $rif;
		echo '<br>
				<h3>Consulta Cliente '.$empresa.'</h3>
				<table align="center" border="0" width="800" class="colorTabla">
						<tr>
							<td align="left" class="letraNegrita">Codigo: </td>
							<td align="left" class="letraNormal">'.$cod.'</td>
							<td align="left" class="letraNegrita">Nombre del Cliente: </td>
							<td align="center" class="letraNormal">'.$empresa.'</td>
							<td align="left" class="letraNegrita">Direccion: </td>
							<td align="left" class="letraNormal">'.$dir.'</td>
						</tr>
						<tr>
							<td align="left" class="letraNegrita">RIF: </td>
							<td align="left" class="letraNormal">'.$rif.'</td>
							<td align="left" class="letraNegrita">Contribuyente: </td>
							<td align="left" class="letraNormal">'.$cont.'</td>
							<td align="left" class="letraNegrita">Fecha: </td>
							<td align="left"class="letraNormal">'.$fecha.'</td>
						</tr>				
				</table><br>
				<table align="center"  class="colorTabla" border="0" width="800"> 
						<tr>
							<td  width="160" align="center">Fecha</td>
							<td  width="160" align="center">Subtotal</td>
							<td width="160" align="center">IVA</td>
							<td width="160" align="center">Total General</td>
							<td width="160" align="center">Monto Retenido</td>
							<td width="160" align="center">Monto a Pagar</td>
						</tr>	
				</table>
				
				
		';
		if($calculo2 = mysql_query('SELECT * FROM calculo WHERE cod_cliente = \''.$cod.'\''))
			{
		while($columna2 = mysql_fetch_array($calculo2))
		{
			echo '
					<!--<table align="center" border="0" width="800" >
						
						<tr>
							<td width="160">'.$subtotal.'</td>
							<td width="160">'.$iva.'</td>
							<td width="160">'.$totalg.'</td>
							<td width="160">'.$montor.'</td>
							<td width="160">'.$montop.'</td>
						</tr>
					</table><hr color="#333333" width="800">-->
				
					<table align="center" border="0" width="800" >
						
						<tr>
							<td width="160">'.$columna2["fechac"].'</td>
							<td width="160">'.$columna2["subtotal"].'</td>
							<td width="160">'.$columna2["iva"].'</td>
							<td width="160">'.$columna2["totalgeneral"].'</td>
							<td width="160">'.$columna2["monto_retenido"].'</td>
							<td width="160">'.$columna2["monto_pagar"].'</td>
						</tr>
						
					</table><hr color="#333333" width="800">
					
					
					';
		}
			}
		}
	else
	{
		?>
        <script language="javascript1.2">
		alert ("Verifique el numero de RIF");
		location.href = "buscar_consulta.php";
		</script>
        <?php
	}
	
	
	}
	
}















?>



<div id="flashContent">
			<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="200" height="40" id="boton" align="middle">
				<param name="movie" value="boton.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="boton.swf" width="200" height="40">
					<param name="movie" value="boton.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
		</div>
        
 </div>       
        
        </body>
        </html>