<?php include("start.php");?>
<?php include("controle/vSession.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" class="no-js">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<link href="css/style_menu.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" type="text/css" href="css/default.css" />-->
<link rel="stylesheet" type="text/css" href="css/component.css" />

<script src="jscript/modernizr.custom.js"></script>
<title>Modulo</title>
</head>

<body>
	

<div id="logo">
      	<img src="images/Jirehpro_logo.png" width="245" style="float: left;" />       
</div>
<?php  include("include/cabecera.php");?>



	<center>
    <div id="cuerpo_general">	
    	<div id="contenedor-home">
            <div id="sub-contenedor-home">
            	<!--Div que contiene el tutilo de Acceso Directo-->
           		<div style="background:rgb(245, 245, 245); text-align:left; padding: 10px 0px 0px 10px; height:30px; border-bottom: 1px  #C0C0C0 solid;border-radius: 10px;">
                	<span style="color: #003E55; font-weight:bold;">Acceso Directos </span>
                </div><!--Cierra div del titulo de Acceso Directo-->
                
                <!--Contiene los Accesos Directos-->
					<div id="fila">
                    	<div id="columna">
                        	<div class="ico_acceso">
                                <img src="images/ico-emp.png" border="0" width="128" />
                                <div>Empleados</div>
                            </div>
                        </div>
                        <div id="columna">
                        	<div class="ico_acceso">
                            	<a href="cliente/registro_cliente.php"><img src="images/ico-nom.png" border="0" width="128" /></a>
                                <div>Cliente</div>
                            </div>
                        </div>
                        <div id="columna">
                            <div class="ico_acceso">
                                <img src="images/ico-cue.png" border="0" width="128" />
                                <div>Cuenta</div>
                            </div>
                        </div>
                        <div id="columna">
                        	<div class="ico_acceso">
                            	<img src="images/ico-rep.png" border="0" width="128" />
                                <div>Reportes</div>
                            </div>
                        </div>
                        <div id="columna">
                        	<div class="ico_acceso">
                            	<a href="facturacion.php?valor=0"><img src="images/ico-fact.png" border="0" width="128" /></a>
                                	<div>Facturacion</div>
                            </div>
                        </div>
                    </div>
                    <div id="spacio"></div>
                    <div id="fila">
                    	<div id="columna">
                        	<div class="ico_acceso">
                            	<a href="presupuesto.php?valor=0"><img src="images/ico-pre.png" border="0" width="128" /></a>
                                <div>Presupuesto</div>
                            </div>
                        </div>
                        <div id="columna">
                        	<div class="ico_acceso">
                                <a href="registro_contacto.php"><img src="images/ico-contacto.png" border="0" width="128" /></a>
                            	<div>Conctactanos</div>
                            </div>
                        </div>
                        <div id="columna">
                            <div class="ico_acceso">
                           		<a href="recibo.php?valor=0"><img src="images/ico-recibos.png" border="0" width="128" /></a>
                                <div>Emision de Recibos</div>
                            </div>
                        </div>
                        <div id="columna">
                        	<div class="ico_acceso">
                            	<img src="images/ico-nom2.png" border="0" width="128" />
                                <div>Reportes</div>
                            </div>
                        </div>
                        <div id="columna">
                        	<div class="ico_acceso">
                            	<img src="images/ico-pagos.png" border="0" width="128" />
                                <div>Pagos</div>
                            </div>
                        </div>
                    </div>
            </div><!--Sub-Contenedor-->
        </div><!--Contenedor-->
            
    </div><!--Cuerpo general--->
    </center>   
    <div id="pie">
            	<?php include("include/piedepagina.php"); ?>
    </div><!--Pie--> 
 	
       <script src="jscript/classie.js"></script>
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