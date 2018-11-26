<?php 
include("../start.php");
require("../conexion.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$clie = new Cliente();
if(isset($_POST["guardar"]) and $_POST["guardar"]=="si")
{
	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
	$clie->EditarCliente($_POST["codi_clie"],$_POST["nom_cliente"],$_POST["rifEmp"],$_POST["nitEmp"],$_POST["datepicker"],$_POST["dirEmp"],$_POST["paisEmp"],$_POST["ciuEmp"],$_POST["estEmp"],$_POST["telEmpr"],$_POST["telEmpropc"],$_POST["contEmp"]);
	exit;
	}
$mod = $clie->ListarCliente($_GET["codi_clie"]);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script type="text/javascript" src="../jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>
<link rel="../stylesheet" href="css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />

<!--Libreria Menu-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>
<script>

     //Codigo del calendario    
     $(function() {
		$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "images/calendar.gif",
		buttonImageOnly: true
		});
		});
		
</script>
<title>Registro del Cliente</title>
</head>
<body class="dt-example" <?php echo $style;?>>

<div id="logo">
            <img src="../images/Jirehpro_logo.png" width="245" style="float: left;" />       
</div>
<?php  include("../include/cabecera_interno.php");
 
	if (isset($_SESSION['k_username']))
	{
		$nomUser = ($_SESSION['k_username']);
		$valSes = 1;
	}
	else
	{
		$valSes = 2;
	}
?>
	   ?>
    <center>
    <div id="cuerpo_general">
    	<div id="tilulos">
            	<div id="botenes">
                 <div style="width:60px; float:left; margin:0px 20px 0px 0px; "><!--Boton consultar--->
                    	<center>
                            <a href="registro_cliente.php">
                                <img src="../images/ico-consu.png" border="0" width="30" />
                                <div>Consulta</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton consultar-->
                	<div style="width:60px; float:left; margin:0px 20px 0px 0px"><!--Boton Añadir--->
                    	<center>
                            <a href="add-cliente.php">
                                <img src="../images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton añadir-->
                </div>	
                <h2 style="padding-top:12px;">Datos del Clientes</h2>
        </div><!----Cierre Div Titulo--->
    	<div id="contenedor">
                <div id="sub-contenedor">
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 10px 0px 0px 10px; height:30px; border-bottom: 1px  #C0C0C0 solid;">
                	<span style="color: #003E55; font-weight:bold;">Cliente </span>
                </div>
                <form name="form_clie" id="form_clie" action="modificar_cliente.php" method="post">
                    <table border="0" width="900" height="300" align="center" id="RegClien" class="regUser">
                        <tr>
                        	<td>
                                 <div><span style="font-weight:bold;font-size:16px">Codigo del Cliente:</span><span style="font-size:16px"> <?php echo $mod[0]['codi_clie'] ?></span></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                 <div><span style="font-weight:bold;font-size:16px">Nombre del Cliente:</span><span style="font-size:16px"> <?php echo $mod[0]['nomb_clie'] ?></span></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div><span style="font-weight:bold;font-size:16px"> Rif:</span><span style="font-size:16px"> <?php echo $mod[0]['rif_clie'] ?></span></div>
                            </td>
                            <td>
                            	<div><span style="font-weight:bold;font-size:16px">NIT:</span><span style="font-size:16px"> <?php echo $mod[0]['nit_clie'] ?></span></div>
                                 </td>
                            <td>
                           		<div><span style="font-weight:bold;font-size:16px">Fecha:</span><span style="font-size:16px">  <?php echo $mod[0]['fech_clie'] ?></span></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4"><span style="font-weight:bold;font-size:16px">Dirección:</span><span style="font-size:16px"> <?php echo $mod[0]['dire_clie'] ?></span></td> 
                       </tr>
                       <tr>
                       		
                            <td><span style="font-weight:bold;font-size:16px">Ciudad:</span><span style="font-size:16px"> <?php echo $mod[0]['ciud_clie'] ?></span></td>
                            <td><span style="font-weight:bold;font-size:16px">Estado:</span><span style="font-size:16px"> <?php echo $mod[0]['esta_clie'] ?></span></td>
                            <td><span style="font-weight:bold;font-size:16px">Pais:</span><span style="font-size:16px"><?php echo $mod[0]['pais_clie'] ?></span></td>
                       </tr>
                       <tr>
                            	
                                <td><span style="font-weight:bold;font-size:16px"> Telefonos*:</span><span style="font-size:16px"> <?php echo $mod[0]['tele_clie'] ?></span></td>
                                <td><span style="font-weight:bold;font-size:16px"> Telefonos(opcional):</span><span style="font-size:16px"><?php echo $mod[0]['tele_clie_opci'] ?></span></td>
                                <td><span style="font-weight:bold;font-size:16px"> Contr:</span> <span style="font-size:16px"><?php echo $mod[0]['cont_espe_clie'] ?></span>
                            </td>
                        </tr>
                         <tr>
                            <td  colspan="4" style=" text-align:center">
                            	<input type="hidden" name="guardar" value="si" />
                            	<input type="hidden" name="codi_clie" value="<?php echo $_GET["codi_clie"] ?>" />
                            	<input type="button" id="btn" name="volver" value="Volver"  onclick="window.location='registro_cliente.php'"/>
                            </td>
                        </tr>
                    </table>
                </form>
                    </div>
        	</div>
            
       </div>
       <div id="pie">
            	<?php include("../include/piedepagina.php");?>
            </div><!--Pie-->
    </center>
    <script src="../jscript/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				menuRight = document.getElementById( 'cbp-spmenu-s2' ),
				menuTop = document.getElementById( 'cbp-spmenu-s3' ),
				menuBottom = document.getElementById( 'cbp-spmenu-s4' ),
				showLeft = document.getElementById( 'showLeft' ),
				showRight = document.getElementById( 'showRight' ),
				showTop = document.getElementById( 'showTop' ),
				showBottom = document.getElementById( 'showBottom' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				showRightPush = document.getElementById( 'showRightPush' ),
				body = document.body;

			/*showLeft.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeft' );
			};*/
			showRight.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );
				disableOther( 'showRight' );
			};
			/*showTop.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuTop, 'cbp-spmenu-open' );
				disableOther( 'showTop' );
			};
			showBottom.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menuBottom, 'cbp-spmenu-open' );
				disableOther( 'showBottom' );
			};
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			showRightPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toleft' );
				classie.toggle( menuRight, 'cbp-spmenu-open' );
				disableOther( 'showRightPush' );
			};
*/
			function disableOther( button ) {
				if( button !== 'showLeft' ) {
					classie.toggle( showLeft, 'disabled' );
				}
				if( button !== 'showRight' ) {
					classie.toggle( showRight, 'disabled' );
				}
				if( button !== 'showTop' ) {
					classie.toggle( showTop, 'disabled' );
				}
				if( button !== 'showBottom' ) {
					classie.toggle( showBottom, 'disabled' );
				}
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
				if( button !== 'showRightPush' ) {
					classie.toggle( showRightPush, 'disabled' );
				}
			}
		</script>

</body>
</html>