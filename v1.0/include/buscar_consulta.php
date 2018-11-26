<?php include("start.php");?>
<?php require("conexion.php"); ?>
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
    <div id="cuerpo_consulta">
     <?php
			if (isset($_SESSION['k_username'])) 
						{
							echo ' <form name="form" action="codigo_bconsulta.php" method="post"><br>
    	<table border="0" align="center"  width="400" >
			<tr>
				<td align="left">
        			Nombre de Cliente: 
				</td>
				<td align="left">
					<input type="text" name="cliente" size="30" >	
				</td>
			</tr>
			
			<tr>
				<td align="left">
        			RIF:
				</td>
				<td align="left">
					<input type="text" name="rif_cliente" size="30" >	
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2">
					<input type="submit" name="buscar" value="Buscar" size="30" >	
					<input type="reset" name="limpiar" value="Limpiar" size="30" >	
				</td>
			</tr>
			<tr>
				<td colspan="3" align="left">
					Nota: Ingresa el numero del Registro de Identificacion Fiscal.
				</td>
			</tr>
        </table>
    
    </form>';	
								}else{
										 echo 'Ingrese el Usuario';
										}
	   ?>

</div>	
	

</body>
</html>