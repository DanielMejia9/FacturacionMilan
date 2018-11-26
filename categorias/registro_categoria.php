<?php include("../start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $cliente = new Cliente();
	  include("../controle/vSession.php");
      //Valor para modiicar automicamente el menu lateral
        $atras = 1;
	  
	  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />


<script src="http://code.jquery.com/jquery-latest.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="../jscript/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script  type="application/javascript" src="../jscript/funciones.js"></script>
<link rel="stylesheet" href="../css/style.css"/>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico"/>
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script type="text/javascript" src="../jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>


<!--Libreria de Menu-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>

<title>Categoria de Clientes</title>
</head>
<body>
    <?php include("../include/menu_top_cliente.php")?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 main">
            <div class="fondo">
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Clientes </span><br><br>
                    <div class="btnSuperior"><a href="add_categoria_cliente.php" class="btn btn-primary">Añadir</a></div>
                </div>
                <br><br>
                <div class="row placeholders"> 
                    <form name="form_clie" id="form_clie" action="registro_cliente.php" method="post">
                 <input type="hidden" name="cod_uniClie" id="cod_uniClie" /> 
                <div class="table-responsive">
                <table widht='100%' id='Tabla'  name='Tabla' style='display:' class='table table-hover' border='0' align='center'  >
                <section>
                    <thead>
                    <tr>
                    
                        <th class="tbDinami">Nº</th>
                        <th class="tbDinami">Cédula</th>
                        <th class="tbDinami">Cliente</th> 
                        <th class="tbDinami">Dirección</th>
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
                    
                    <td><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $row[$i]["codi_clie"] ?></a></td>
                    
                    <td><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo substr(ucwords($row[$i]["cedula"]),0,20);?></a></td>
                    <td><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo substr(ucwords($row[$i]["nomb_clie"]),0,20);?></a></td>
                    <td><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo substr($row[$i]["dire_clie"],0,50)."...";?></a></td>
                    <td><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $row[$i]["tele_clie"]?></a></td>
                    <td><a href="javascript:void(0);" onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $row[$i]["tele_clie_opci"]?></a></td>
                    <!--<td ><img src="images/modificar.png" style="cursor:pointer;" width="20" title="Modificar" align="center" onclick="modificarClie(<?php echo $row["codi_clie"] ?>)" /></td>
                    <td><img src="images/eliminar.png"   style="cursor:pointer;"title="Eliminar" width="20" align="center" onclick="eliminarClie(<?php echo $row["codi_clie"]?>)"></td>-->
                     <!--<td ><a href="javascript:void(0);" onclick="window.location='ver_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><img src="../images/ico_info.png" style="cursor:pointer;" width="20" title="Ver" align="center"/></a></td>
                     --><td ><a href="javascript:void(0);" class="btn btn-warning"  onclick="window.location='modificar_cliente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"></a></td>
                    <td><a class="btn btn-danger" style="cursor:pointer;"title="Eliminar" width="20" align="center" onclick="eliminarClie(<?php echo $row[$i]["codi_clie"]?>)"></a> </td>
                    </tr>
                    
                    
                   <?php
                    }
                    ?>
                   
                    </section>
                </table>
                </div>
                </form>
                </div>
                <div class="row placeholders"> 
                    <div class="col-md-12">
                    <nav aria-label="...">
                        <ul class="pager">
                    <?php
					if($inicio==0)
					{
					?>
					<!--<li class="previous"><a href="#"><span class="glyphicon glyphicon-menu-left " aria-hidden="true" ></span> Anteriores</a></li>-->
                    <?php
					}
						else
						{
							$anterior =$inicio-10;
							?>
                            <li class="previous"><a href="?posicion=<?php echo $anterior ?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> Anteriores</a></li>
                            <?php
						}
						
					?>
                    	&nbsp;&nbsp;
                        
                        <?php
						if(count($paginacion)>=10)
						{
							$proxima = $inicio+10;
							?>
                            <li class="next"><a href="?posicion=<?php echo $proxima;?>">Siguientes <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></li>
                            <?php
							}
							else
							{
								?>
								<li class="next"><a href="#">Siguientes <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></li>
                                <?php
							}
						?>
                        </ul>
                        </nav>
                    </div>
                </div>	

            </div>
            </div>
        </div>
    </div>
    
    	
                            
                        
                            
                       
               
        	
                  
                   
        
    
</body>
</html>