<?php
require("conexion.php");
include("start.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--<link rel="stylesheet" href="style_imprimir.css"/>-->
<link rel="stylesheet" href="style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<title>...::JirehPro - Calculo::...</title>
<script language="javascript" src="guardar.js"></script>
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
<div id="cajaOpcion">
<form action="guarda_monto.php" method="post" name="form">
<table border="0"  align="right" width="100" class="colorInput">
	<tr>
    	<td>
        	 <a href="#"><img src="imagen/atras.png" border="0" width="30" value="Atras" onclick="location.href='buscar_calculo.php'" /></a><p class="atrasAllado">Atrás</p>
        </td>
        <td>
        	<a href="#"><img src="imagen/Printer-icon[4].png"  border="0" width="30" value="Imprimir" onclick=printPage(); /></a><p class="atrasAllado">Imprimir</p>
        </td>
    </tr>
    <tr>
    	<td colspan="2">   
            <input type="submit"  value="Guardar"  name="guardar"/>
        </td>
   </tr>
</table>


</div>

<div id="fondoTabla">
<?php
$monto = $_POST["monto"];
$iva = $monto * 0.12;
$totalg = $monto + $iva;

$retencion = $iva * 0.75;

$ivar = $iva - $retencion ;
$total = $ivar + $monto;


$empresa = $_POST["empresa"];
$direccion = $_POST["direccion"];
$rif = $_POST["rif"];
$cont = $_POST["cont"];
$cod = $_POST["codigo"];
$fecha = $_POST["fecha"];

echo'
			<h3>Calculo Cliente '.$empresa.' </h3>
			<table width="800" border="0" align="center" class="colorTabla">
				<tr>
							<td align="left" class="letraNegrita">Codigo: </td>
							<td align="left" class="letraNormal"><input type="text" name="codigo" value="'.$cod.'"></td>
							<td align="left" class="letraNegrita">Nombre del Cliente: </td>
							<td align="center" class="letraNormal">'.$empresa.'</td>
							<td align="left" class="letraNegrita">Direccion: </td>
							<td align="left" class="letraNormal">'.$direccion.'</td>
						</tr>
						<tr>
							<td align="left" class="letraNegrita">RIF: </td>
							<td align="left" class="letraNormal">'.$rif.'</td>
							<td align="left" class="letraNegrita">Contribuyente: </td>
							<td align="left" class="letraNormal">'.$cont.'</td>
							<td align="left" class="letraNegrita">Fecha: </td>
							<td align="left"class="letraNormal">'.$fecha.'</td>
						</tr>
			</table>			
			<table width="800" border="0" align="center" class="tablaCalculo">
				<tr>
					<td align="left">SUB-TOTAL </td>
					<td align="right"><input type="text" name="monto" value="'.$monto.'"></td>
				</tr>
				<tr>
					<td align="left">I.V.A. </td>
					<td align="right"><input type="text" name="iva" value="'.$iva.'"></td>
				</tr>
				<tr>
					<td align="left">TOTAL GENERAL </td>
					<td align="right"><input type="text" name="totalg" value="'.$totalg.'"></td>
				</tr>
				<tr>
					<td align="left">MONTO RETENIDO</td>
					<td align="right"><input type="text" name="montor" value="'.$retencion.'"></td>
				</tr>
				<tr>
					<td align="left">MONTO A PAGAR </td>
					<td align="right"><input type="text" name="montop" value="'.$total.'"></td>
				</tr>           				
			</table><br><br>
			</form>
			';
?>

<script>
 function printPage()
 {
 	if (window.print)
		{
			confirme = confirm ('¿Desea imprimir?');
			if (confirme) window.print();
		}
 
 }
 </script>


</div>
</form>
</body>
</html>