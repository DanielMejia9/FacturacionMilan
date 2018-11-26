<?php include("../start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $cliente = new Cliente();
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
		buttonImage: "images/calendar.gif",
		buttonImageOnly: true
		});
		});
</script>
<!--Libreria de Menu-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>

<title>Registro del Cliente</title>
</head>
<body class="dt-example" <?php echo $style;?>>
    <div id="logo">
            <img src="../images/Jirehpro_logo.png" width="245" style="float: left;" />       
    </div>
	<?php  include("../include/cabecera_interno.php");?>

    
 	<?php
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
                <h2 style="padding-top:12px;">Clientes Registrados</h2>
        	</div><!----Cierre Div Titulo--->
            
            <div id="sub-contenedor-cliente">
                	
                 <!--Muestra la lista de clientes-->
                 <form name="form_clie" id="form_clie" action="registro_cliente.php" method="post">
                 <input type="hidden" name="cod_uniClie" id="cod_uniClie" /> 
                <table widht='100%' id='Tabla'  name='Tabla' style='display:' class='tbRegClie' border='0' align='center' rules="all"  >
                <section>
                    <thead>
                    <tr>
                    
                        <th class="tbDinami">Nº</th>
                        <th class="tbDinami">Cliente</th>
                        <th class="tbDinami">Rif</th> 
                        <th class="tbDinami">Direccion</th>  
                        <th class="tbDinami">Ciudad</th>
                        <th class="tbDinami">Estado</th>
                        <th class="tbDinami">Telefono</th>
                        <th class="tbDinami">Telefono</th> 
                        <!--<th>Ver</th>-->
                        <th>Mod.</th>
                        <th>Elim.</th>
                     </tr>
                 </thead>
                 <tbody>
                 <?php
				 //Creamos una condicion para darle un valor al parametro en enviado a la funcion del Paginado
				 if(isset($_GET["posicion"]))
				 {
					 $inicio = $_GET["posicion"];
					 }
					 else
					 {
						 $inicio=0;
						 }
				 //Llamamos a la function de paginacion
				 $paginacion = $cliente->PaginadoCliente($inicio);
				 
				 //Instanciamos la funcion para mostrar todos los registro de los clientes
				 $row = $cliente->MostrarClienteTabla();
				 
				 //Declaramos a ind con un valor 0
				 $ind=0;
				 
				 for($i=0; $i<sizeof($paginacion); $i++)
				 //for($i=0; $i<10; $i++)

                {
					//Indice de la tabla
                    $ind= $ind + 1;
					
                    ?>
                   
                    <tr <?php $ind ?> class="fila">
                    
                    <td style="padding-left:14px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $ind ?></a></td>
                    
                    <td style="padding-left:10px" title="<?php echo ucwords($row[$i]["nomb_clie"])?>"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo substr(ucwords($row[$i]["nomb_clie"]),0,20);?></a></td>
                    <td style="padding-left:10px" width="100px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $row[$i]["rif_clie"]?></a></td>
                    <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo substr($row[$i]["dire_clie"],0,50)."...";?></a></td>
                    <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo ucwords($row[$i]["ciud_clie"])?></a></td>
                    <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo ucwords($row[$i]["esta_clie"])?></a></td>
                    <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $row[$i]["tele_clie"]?></a></td>
                    <td style="padding-left:10px"><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $row[$i]["tele_clie_opci"]?></a></td>
                    <!--<td ><img src="images/modificar.png" style="cursor:pointer;" width="20" title="Modificar" align="center" onclick="modificarClie(<?php echo $row["codi_clie"] ?>)" /></td>
                    <td><img src="images/eliminar.png"   style="cursor:pointer;"title="Eliminar" width="20" align="center" onclick="eliminarClie(<?php echo $row["codi_clie"]?>)"></td>-->
                     <!--<td ><a href="javascript:void(0);" onclick="window.location='ver_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><img src="../images/ico_info.png" style="cursor:pointer;" width="20" title="Ver" align="center"/></a></td>
                     --><td ><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><img src="../images/modificar.png" style="cursor:pointer;" width="20" title="Modificar" align="center"/></a></td>
                    <td><img src="../images/eliminar.png"   style="cursor:pointer;"title="Eliminar" width="20" align="center" onclick="eliminarClie(<?php echo $row[$i]["codi_clie"]?>)"></td>
                    </tr>
                    
                    
                   <?php
                    }
                    ?>
                   
                    </section>
                </table>
                </form>
                	
                
                    </div><!--Sub-Contenedor-->
                    <div id="paginacion"><!-- Paginacion--> 
                    <?php
					
					if($inicio==0)
					{
					?>
						Anteriores
                        <?php
						}
						else
						{
							$anterior =$inicio-20;
							?>
                            <a href="?posicion=<?php echo $anterior ?>" title="Anteriores">Anteriores</a>
                            <?php
						}
						
					?>
                    	&nbsp;&nbsp;
                        
                        <?php
						if(count($paginacion)>=20)
						{
							$proxima = $inicio+20;
							?>
                            <a href="?posicion=<?php echo $proxima;?>" title="Siguiente">Siguientes</a>
                            <?php
							}
							else
							{
								?>
								Siguientes
                                <?php
							}
						?>
                    </div><!-- Paginacion--> 
                   
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