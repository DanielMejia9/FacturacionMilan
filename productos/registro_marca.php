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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<script  type="application/javascript" src="../jscript/funciones.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


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

<title>Marcas</title>
</head>
<body>
    <?php include("../include/menu_top.php")?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?php
                    include ("../include/menu_lateral_1.php");
                 ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="fondo">
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Marcas </span><br><br>
                    <div class="btnSuperior"><a href="add_marca.php" class="btn btn-primary">Añadir</a></div>
                </div>
                <br><br>
                <div class="row placeholders"> 
                    <form name="categoria" id="categoria" action="registro_categoria.php" method="post">
                 <input type="hidden" name="cod_uniClie" id="cod_uniClie" /> 
                <div class="table-responsive">
                <table widht='100%' id='Tabla'  name='Tabla' style='display:' class='table table-hover' border='0' align='center'  >
                <section>
                    <thead>
                    <tr>
                    
                        <th class="tbDinamiCentrado">Nº</th>
                        <th class="tbDinamiCentrado">Marca</th>
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
				 $paginacion = $cliente->PaginadoMarca($inicio);
				 
				 //Instanciamos la funcion para mostrar todos los registro de los clientes
				 $row = $cliente->MostrarMarcaTabla();
				 
				 //Declaramos a ind con un valor 0
				 $ind=0;
				 
				 for($i=0; $i<sizeof($paginacion); $i++)
				 //for($i=0; $i<10; $i++)

                {
					//Indice de la tabla
                    $ind= $ind + 1;
					
                    ?>
                   
                    <tr <?php $ind ?> class="fila">
                    
                    <td><?php echo $row[$i]["id_marca"] ?></a></td>
                    
                    <td><?php echo substr(ucwords($row[$i]["descripcion_marca"]),0,20);?></a></td>
                    <td><a href="javascript:void(0);" class="btn btn-warning"  onclick="window.location='modificar_marca.php?id=<?php echo $row[$i]["id_marca"]?>'"></a></td>
                    <td><a class="btn btn-danger" style="cursor:pointer;" title="Eliminar" width="20" align="center" onclick="eliminaCategoria(<?php echo $row[$i]["id_marca"]?>)"></a> </td>
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