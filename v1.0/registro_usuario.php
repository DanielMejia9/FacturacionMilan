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
<script type="text/javascript" src="jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="jscript/jquery-1.3.min.js"></script>

<script src="jscript/jquery.ui.core.js"></script>
<script src="jscript/jquery.ui.widget.js"></script>
<script src="jscript/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="css/jquery.ui.all.css">
<link href="css/style_menu.css" rel="stylesheet" type="text/css" />
<script>
     
     //Codigo del calendario    
     $(function() {
		$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "images/calendar.gif",
		buttonImageOnly: true
		});
		});
		
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


<title>Registro de usuario</title>
</head>
<body <?php echo $style;?>>

<div id="logo">
      	<img src="images/Jirehpro_logo.png" width="245" />
    </div>
    <div id="liDet">
    	<span style="padding-left:5px"><?php echo ("Bienvenido! "). ucwords ($nomUser);?></span>
    </div>
    
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
    <div id="cuerpo_general">
    <div id="contenedor">
        <div id="sub-contenedor">
        <form name="form_user" id="form_user" action="modificar_reg.php" method="post">
        
            <table border="0" width="650" height="" align="center" class="regUser">
                <tr>
                    <td align="center" colspan="2">
                    	<h2>Registro de Usuario</h2><hr />
                    </td>
                </tr>
                <tr>
                	<td width="200">
                    	<img src="images/user.png"  width="200" />
                    </td>
                    <td align="center">
                    	<table border="0" align="center">
                        	<tr>
                            	<td>Nombres:</td>
                                <td align="left"><input type="text" name="nom_usu" id="nom_usu" maxlength="50" size="20" /></td>
                            </tr>
                            <tr>
                            	<td> Apellidos:</td>
                                <td> <input type="text" name="ape_usu" id="ape_usu" maxlength="50" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Nº Cédula:</td>
                                <td> <input type="text" name="ced_usu" id="ced_usu" maxlength="8" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Cargo:</td>
                                <td> <input type="text" name="car_usu" id="car_usu" maxlength="50" size="20" class=""/></td>
                            </tr>
                            </tr>
                            <tr>
                            	<td> Permisología:</td>
                                <td>
                                    <select name="per_usu" id="per_usu">
                                    <option></option>
                                    <option value="1">SuperAdministrador</option>
                                    <option value="2">Administrador</option>
                                    <option value="3">Especial</option>
                                    <option value="4">Empleado</option>
                                   </select></td>
                            </tr>
                            <tr>
                            	<td>Contraseña</td>
                                <td> <input type="password" name="pass_usu" id="pass_usu" maxlength="12" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Confir.Contraseña</td>
                                <td> <input type="password" name="conf_pass_usu" id="conf_pass_usu" maxlength="12" size="20" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>              
                 <tr>
                    <td colspan="2" style=" text-align:center">
                        <input type="button" id="btn" name="username" value="Registrar"  onclick="validaReguser();"/>
                        <input type="reset" id="btn" value="Limpiar" />
                        <input type="button" id="btn" name="verUser" value="Ver/Oculta Lista"  Onclick="verUsuer();"/>
                        <input  type="hidden" name="mostrUser" id="mostrUser"  />
                        
                        
                    </td>
                </tr>
            </table>
            
            
            <!-- Rescata el valor del Codigo ID del usuario-->
            <input type="hidden" name="cod_uni" id="cod_uni" /> 
            
                       
          <table widht="650" id="Tabla1"  name="Tabla1" style="display:none" class="tbRegUsu" border="0"   align="center" rules="all">
		 <tr><h2 style="display:none" id="titulo1">Lista de Usuarios</h2>
		
		 	<th><div class="tbDinami"><b>Nº</b></th>
		 	<th><div class="tbDinami"><b>Nombre</b></th>
		 	<th><div class="tbDinami"><b>Apellido</b></th> 
		 	<th><div class="tbDinami"><b>Nº Cédula</b></th> 
		 	<th><div class="tbDinami"><b>Cargo</b></th>  
		 	<th><div class="tbDinami"><b>Permisología</b></th>  
		 	<th><b>Mod.<b></th>
		 	<th><b>Elim.<b></th>
          </tr>
 
	
		<?php
        $selec= mysql_query('SELECT * FROM tb_user_reg');
		$i=0;
		while($row = mysql_fetch_array($selec))
		{
			$i= $i + 1;
			?>
            <tr <?php $i ?>>
			<td><?php echo $i ?></td>
		 	<td><?php echo $row["nom_usuario"] ?></td>
			<td><?php echo $row["ape_usuario"] ?></td>
            <td><?php echo $row["ced_usuario"] ?></td>
            <td><?php echo $row["car_usuario"] ?></td>
            <td><?php echo $row["tip_usuario"] ?></td>
            <td><img src="images/modificar.png" width="20" title="Modificar" align="center" onclick="modificarReg(<?php $row["id"]?>);" /></td>
			<td><img src="images/eliminar.png" title="Eliminar" width="20" align="center" onclick="eliminarReg(<?php $row["id"]?>);"></td>
            </tr>
			<?php
			}
			?>
           
        </table>
        </form>
        		</div><!--Sub-Contenedor-->
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
       <div id="pie">
            	Desarrollado por Tecnologia y Desarrollo Jirehpro, C.A. J-40135922-1
                Para soporte Técnico contactenos al 0212.888.81.12 - Sitio Web: wwww.jirehpro.com
        </div><!--Pie-->
    </center>
	
	

</body>
</html>