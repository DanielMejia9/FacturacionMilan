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
<script>
function bloquear(){
	document.getElementById("carg_asig").disabled = true
	
	}
// funcion para limpiar campo onFocus="javascript:this.value=''" 
</script>

<title>Registro de usuario</title>
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
	   		
// Rescata el valor del Codigo ID del usuario
$cod_uni = $_POST["cod_uni"];




//mysql_query("UPDATE tb_user_reg SET nom_usuario = 'jejej' WHERE id ='".$cod_uni."'");
$muest = mysql_query("SELECT * FROM tb_user_reg  WHERE id ='".$cod_uni."'");
//$muest = mysql_query("SELECT * FROM tb_user_reg  WHERE id = 302 ");
$col = mysql_fetch_array($muest);


								if ($col['tip_usuario'] == 1)
								
							   {
								   $val_permiso = "SuperAdministrador";
								   }
								   else if ($col['tip_usuario'] == 2)
								   {
									   $val_permiso = "Administrador";
									   }
									   else if ($col['tip_usuario'] == 3)
								   		{
									   $val_permiso = "Especial";
									   }
									   else{
										   $val_permiso = "Empleado";
										   }	   





include("include/menu.php");

?>
    <center>
    <div id="cuerpo_general"><br />
    <div style="position:relative; text-align:left; margin-left:100px;">
    	<a href="registro_usuario.php"><img src=""   />Regresar</a>
    </div>
        <form name="form_moduse" id="form_moduse" action="modificar_reg.php" method="post">
        <input type="hidden" name="cod_uni" id="cod_uni" value="<?php echo $cod_uni?>"  />
            <table border="0" width="650" height="" align="center" class="regUser">
                <tr>
                    <td align="center" colspan="2">
                    	<h2>Modificar Datos de Usuario</h2><hr />
                    </td>
                </tr>
                <tr>
                	<td width="200">
                    	<img src="images/user.png"  width="200" />
                    </td>
                    <td align="center">
                    	<table border="0" align="center" >
                        	<tr>
                            	<td>Código: </td>
                                <td><?php echo $col['id']?></td>
							</tr>
                        	<tr>
                            	<td>Usurio: </td>
                                <td><?php echo $col['nom_usuario']?>, <?php echo $col['ape_usuario']?></td>
							</tr>
                            	<td>Nº Cédula: </td>
                                <td><?php echo $col['ced_usuario']?></td>
                            </tr>
                            <tr>
                            	<td>Cargo: </td>
                                <td><?php echo $col['car_usuario']?></td>
                            </tr>
                            <tr>
                            	<td>Permisología: </td>
                                <td><?php echo $val_permiso?></td>
                            </tr>
                            </tr>
                        </table>
                        <br />
                        <hr />
                        <br />
                        <table border="0" align="center">
                        	<tr>
                            	<td>Nombres:</td>
                                <td align="left"><input type="text" class="txt_mod" name="nom_usum" value="<?php echo $col["nom_usuario"]?>" id="nom_usum" maxlength="50" size="20" /></td>
                            </tr>
                            <tr>
                            	<td> Apellidos:</td>
                                <td> <input type="text" name="ape_usum"  class="txt_mod" id="ape_usum" value="<?php echo $col["ape_usuario"]  ?>" maxlength="50" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Nº Cédula:</td>
                                <td> <input type="text" name="ced_usum" class="txt_mod"  id="ced_usum" value="<?php echo $col["ced_usuario"]  ?>" maxlength="8" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Cargo:</td>
                                <td> <input type="text" name="car_usum" class="txt_mod"  id="car_usum" value="<?php echo $col["car_usuario"]  ?>" maxlength="50" size="20" /></td>
                            </tr>
                            </tr>
                            <tr>
                            	<td> Permisología:</td>
                                <td>
									<select name="per_usum" id="per_usum" >
                                    <option></option>
                                    <option value="1">SuperAdministrador</option>
                                    <option value="2">Administrador</option>
                                    <option value="3">Especial</option>
                                    <option value="4">Empleado</option>
                                   </select>
								</td>
                            </tr>
                            <tr>
                            	<td>Contraseña</td>
                                <td> <input type="password" name="pass_usum" id="pass_usum" maxlength="12" size="20" /></td>
                            </tr>
                            <tr>
                            	<td>Confir.Contraseña</td>
                                <td> <input type="password" name="conf_pass_usum" id="conf_pass_usum" maxlength="12" size="20" /></td>
                            </tr>
                        </table>
                    </td>
                </tr>              
                 <tr>
                    <td colspan="2" style=" text-align:center">
                        <input type="button" id="btn" name="btnmod" value="Modificar"  onclick="validaModuser();"/>
                        <input type="reset" id="btn" value="Limpiar" />
                    </td>
                </tr>
            </table>
        </form>
        
       </div>
    </center>
	
	

</body>
</html>