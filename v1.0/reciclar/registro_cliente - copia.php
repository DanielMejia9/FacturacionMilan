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
<title>Registro del Cliente</title>
</head>
<body class="dt-example" <?php echo $style;?>>

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
    	<div id="tilulos">
            	<h2>Clientes</h2>	
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
                <form name="form_clie" id="form_clie" action="registro_cliente.php" method="post">
                    <table border="0" width="900" height="300" align="center" id="RegClien" class="regUser">
                        <tr>
                            <td>
                                <h2>Datos de la Empresa</h2><hr />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre del Cliente: <input type="text" name="nom_cliente" id="nom_cliente" maxlength="250" size="30" />
                                Rif: <input type="text" name="rifEmp" id="rifEmp" maxlength="12" size="15" />
                                NIT: <input type="text" name="nitEmp" id="nitEmp" maxlength="15" size="15" />
                                Fecha: <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Dirección: <input type="text" name="dirEmp" id="dirEmp" maxlength="200" size="50" />
                                Pais: <input type="text" name="paisEmp" id="paisEmp" maxlength="12" size="20" />
                                Ciudad: <input type="text" name="ciuEmp" id="ciuEmp" maxlength="50" size="20" />
                            </td>
                       </tr>
                       <tr>
                            <td>
                                Estado: <input type="text" name="estEmp" id="estEmp" maxlength="12" size="20" />
                                Telefonos*: <input type="text" name="telEmpr" id="telEmpr" maxlength="11" size="20" />
                                 Telefonos(opcional): <input type="text" name="telEmpropc" id="telEmpropc" maxlength="11" size="20" />
                                Contr: 
                               <!--<input type="text" name="contribuyente" maxlength="2" size="2" />-->
                               <select name="contEmp" id="contEmp">
                                <option></option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                               </select>
                              
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <br /><br />
                                <h2>Datos persona contacto</h1><hr />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombres: <input type="text" name="nomCont" maxlength="25" size="30" />
                                Apellidos: <input type="text" name="apeCont" maxlength="25" size="30" />
                                Cargo: <input type="text" name="carCont" maxlength="15" size="25" />
                               
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                Telefonos: <input type="text" name="telCont" maxlength="11" size="25" />
                                Correo: <input type="text" name="correo" maxlength="25" size="25" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td style=" text-align:center">
                                <input type="button" id="btn" name="username" value="Registrar"  onclick="validaReg();"/>
                                <input type="reset" id="btn" value="Limpiar" />
                                 <input type="button" id="btn" name="verUser" value="Ver/Oculta Lista"  Onclick="verUsuer();"/>
                                <input  type="hidden" name="mostrUser" id="mostrUser"  />
                            </td>
                        </tr>
                    </table>
                    
                    <!-- Rescata el valor del Codigo ID del usuario-->
                    <input type="hidden" name="cod_uniClie" id="cod_uniClie" />   
                    
                    
                    <!--Muestra la lista de clientes-->
                <table widht='100%' id='Tabla1'  name='Tabla1' style='display:none' class='tbRegClie' border='0' align='center' rules="all"  >
                <section>
                    <thead>
                    
                    <tr><th colspan="2"><h2>Clientes</h2></th></tr>
                    <tr>
                    
                        <th class="tbDinami">Nº</th>
                        <th class="tbDinami">Cliente</th>
                        <th class="tbDinami">Rif</th> 
                        <th class="tbDinami">Direccion</th>  
                        <th class="tbDinami">Ciudad</th>
                        <th class="tbDinami">Estado</th>
                        <th class="tbDinami">Telefono</th>
                        <th class="tbDinami">Telefono</th> 
                        <th>Mod.</th>
                        <th>Elim.</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
                $selec= mysql_query('SELECT * FROM tb_regi_cli');
                $i=0;
                while($row = mysql_fetch_array($selec))
                {
                    $i= $i + 1;
                    ?>
                    
                    <tr <?php $i ?>>
                    <td style="padding-left:20px"><?php echo $i ?></td>
                    <td style="padding-left:10px"><?php echo $row["nomb_clie"]?></td>
                    <td style="padding-left:10px" width="100px"><?php echo $row["rif_clie"]?></td>
                    <td style="padding-left:10px"><?php echo $row["dire_clie"]?></td>
                    <td style="padding-left:10px"><?php echo $row["ciud_clie"]?></td>
                    <td style="padding-left:10px"><?php echo $row["esta_clie"]?></td>
                    <td style="padding-left:10px"><?php echo $row["tele_clie"]?></td>
                    <td style="padding-left:10px"><?php echo $row["tele_clie_opci"]?></td>
                    <td ><img src="images/modificar.png" width="20" title="Modificar" align="center" onclick="modificarClie(<?php $row["codi_clie"] ?>)" /></td>
                    <td><img src="images/eliminar.png" title="Eliminar" width="20" align="center" onclick="eliminarClie(<?php $row["codi_clie"]?>)"></td>
                    <td><?php $row['esta_clie']?></td>
                    </tr>
                    
                    
                   <?php
                    }
                    ?>
                    </tbody>
                </table>
                </section>
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