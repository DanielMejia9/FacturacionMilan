<?php include("../start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $add = new Cliente();
	  
	  if(isset($_POST["anadir"]) and $_POST["anadir"]=="si")
		{
		//print_r($_POST);
		//print_r($_POST["codi_clie"]);
		$addCliente = $add->AnadirCliente($_POST["nom_cliente"],$_POST["rifEmp"],$_POST["nitEmp"],$_POST["datepicker"],$_POST["dirEmp"],$_POST["paisEmp"],$_POST["ciuEmp"],$_POST["estEmp"],$_POST["telEmpr"],$_POST["telEmpropc"],$_POST["contEmp"]);
			exit;
		}
	  include("../controle/vSession.php");
	  
	  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script type="text/javascript" src="../jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="../css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<script>

     //Codigo del calendario    
     $(function() {
		$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonImage: "../images/calendar.gif",
		buttonImageOnly: true
		});
		});
		
</script>

<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>

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
    <center>
    <div id="cuerpo_general">
    	
    	<div id="contenedor-cliente">
        	
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
                            <a href="add_cliente.php">
                                <img src="../images/ico-add.png" border="0" width="30" />
                                <div>Añadir</div>	
                            </a>
                        </center>
                    </div><!--Cierre boton añadir-->
                </div>	
                <h2 style="padding-top:12px;">Añadir Clientes</h2>
        </div><!----Cierre Div Titulo--->
        
                <div id="sub-contenedor-cliente">
                <!--<div style="background:rgb(245, 245, 245); text-align:left; padding: 10px 0px 0px 10px; height:30px; border-bottom: 1px  #C0C0C0 solid;">
                	<span style="color: #003E55; font-weight:bold;">Datos de la Empresa </span>
                </div>-->
                <form name="form_clie" id="form_clie" action="add_cliente.php" method="post">
                    <table border="0" width="900" height="300" align="center" id="RegClien" class="regUser">
                    	<tr>
                            <td>
                                <h2>Datos de la Empresa</h2><hr />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre del Cliente: <input type="text" name="nom_cliente" id="nom_cliente" maxlength="250" size="50" />
                                Rif: <input type="text" name="rifEmp" id="rifEmp" maxlength="12" size="10" />
                                NIT: <input type="text" name="nitEmp" id="nitEmp" maxlength="15" size="10" />
                                Fecha: <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Dirección: <input type="text" name="dirEmp" id="dirEmp" maxlength="200" size="61" />
                                Pais: <input type="text" name="paisEmp" id="paisEmp" maxlength="12" size="7" />
                                Ciudad: <input type="text" name="ciuEmp" id="ciuEmp" maxlength="50" size="7" />
                                Estado: <input type="text" name="estEmp" id="estEmp" maxlength="12" size="7" />
                            </td>
                       </tr>
                       <tr>
                            <td>
                                
                                Telefonos*: <input type="text" name="telEmpr" id="telEmpr" maxlength="14" size="10" />
                                 Telefonos(opcional): <input type="text" name="telEmpropc" id="telEmpropc" maxlength="14" size="10" />
                                Contr: <select name="contEmp" id="contEmp">
                                			<option value="NO">NO</option>
                                            <option value="SI">SI</option>
                                       </select>
                              
                            </td>
                        </tr>
                         <tr>
                            <td style=" text-align:center">
                            	<input  type="hidden" name="anadir" id="anadir"  value="si" />
                                <a type="reset" class="btn" onclick="window.location='registro_cliente.php'" />Volver</a>
                                <a class="btn" name="username" onclick="validaReg();"/>Registrar</a>
                                
                                
                            </td>
                        </tr>
                    </table>
                </form>
                    </div><!--Sub-Contenedor-->
        	</div><!--Contenedor-->
            
       </div><!--Cuerpo general--->
       <div id="pie">
            	<?php include("../include/piedepagina.php"); ?>
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