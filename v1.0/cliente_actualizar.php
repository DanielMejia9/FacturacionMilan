<?php include("start.php");?>
<?php require("conexion.php"); ?>
<?php include("controle/vSession.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<script  type="application/javascript" src="jscript/funciones.js"></script>

<script language="javascript" src="jscript/jquery-1.3.min.js"></script>
<link href="css/style_menu.css" rel="stylesheet" type="text/css" />
<script>	
	//Codigo script del menu
	function mainmenu(){
		$(" #nav ul ").css({display: "none"});
		$(" #nav li").hover(function(){
		$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
		$(this).find('ul:first').slideUp(400);
		});
		}
		$(document).ready(function(){
			mainmenu();
		});
</script>
<title>Registro del Cliente</title>
</head>
<body <?php echo $style;?>>
 <?php
	if (isset($_SESSION['k_username'])) {
		$nomUser = ($_SESSION['k_username']);
		$valSes = 1;
		}
		else{
		$valSes = 2;
		}
	   ?>
	   <?php include("include/menu.php");?>
    <center>
    <div id="cuerpo_general"><br />
    <form action="cliente_actualizar.php" method="post" name="tb_cliente">
    <?php
    $result= mysql_query('SELECT * FROM tb_regi_cli ORDER BY codi_clie');
		echo "<table widht='100%' class='regUser' border='0'  align='center' rules='all'>";
		echo "<tr><h2>Lista de Clientes</h2> \n";
		echo "<td><div class='tbDinami'><b>Codigo</b></td>";
		echo "<td><div class='tbDinami'><b>Nombre</b></td>";
		echo "<td><div class='tbDinami'><b>RIF</b></td>"; 
		echo "<td><div class='tbDinami'><b>NIT</b></td>"; 
		echo "<td><div class='tbDinami'><b>Dirección</b></td>";  
		echo "<td><div class='tbDinami'><b>Teléfonos</b></td>";  
		echo "<td><div class='tbDinami'><b>¿Contribuyente?</b></td>";
		echo "<td><b>Mod.<b></td>";
		echo "<td><b>Elim.<b></td>";
		echo "</tr> \n";
		$i=0;
		while($row = mysql_fetch_array($result))
		{
			$i= $i + 1;
			echo "<tr $i class=''><td  style='padding:7px'>";
			echo "$row[codi_clie]</td>";
			
            echo "<input type='hidden' name='codi_uni'  id='codi_uni' value='$row[codi_clie]$i' />";
			
			echo "<td style='padding:7px'>";
			echo "$row[nomb_clie]";
			
			echo "<td style='padding:7px'>";
			echo "$row[rif_clie]";
			
			echo "<td style='padding:7px'>";
			echo "$row[nit_clie]";
			
			echo "<td style='padding:7px'>";
			echo "$row[dire_clie], $row[ciud_clie], Edo. $row[esta_clie]";
			
			echo "<td style='padding:7px'>";
			echo "$row[tele_clie] / $row[tele_clie_opci]";
			
			echo "<td style='padding:7px'>";
			echo "$row[cont_espe_clie]";
			
			echo "<td><a href='#'><img src='images/modificar.png' width='20' align='center' onclick='modificarReg();'></a>";
			echo "<td><a href='#'><img src='images/eliminar.png' width='20' align='center' onclick='eliminarReg();'></a>";
			echo "</tr>";
			
			
			}
    		echo "</table>";
			
			
			
			
    
    
     ?>  
     </form>
//     <?php 
//	 		$valorR = $_POST["codi_uni"];
//			echo  $valorR; 
//	?>
   	</div>
    </center>
	
	

</body>
</html>