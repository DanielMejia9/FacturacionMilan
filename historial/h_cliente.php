<?php include("../start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $cliente = new Cliente();
	  include("../controle/vSession.php");
	  
	  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico"/>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script  type="application/javascript" src="../jscript/funciones.js"></script>


<title>Registro del Cliente</title>
</head>
<body>
    <?php include("../include/menu_top.php")?>
    <section id="contenido">
     <div class="container">
        <div class="fondo">
            <div class="row">
            	<div class="col-md-12">
                    <h3 style="padding-top:12px;">Seleccione Cliente</h3>
                </div>
            </div>
            <div class="row">
            <div class="table-responsive">
            <table class="table">
                    <thead>
                    <tr>
                    
                        <td>#</td>
                        <td>Cliente</td>
                        <td># Exp</td> 
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
                        <td style="padding-left:14px"><a href="javascript:void(0);" onclick="window.location='listing_expediente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo $ind ?></a></td>
                        <td style="padding-left:10px" title="<?php echo ucwords($row[$i]["nomb_clie"])?>"><a href="javascript:void(0);" onclick="window.location='listing_expediente.php?codi_clie=<?php echo $row[$i]["codi_clie"]?>'"><?php echo substr(ucwords($row[$i]["nomb_clie"]),0,20);?></a></td>
                    </tr>
                   
                   <?php
                    }
                    ?>

                
                </div>
            </div>
        </div>
     </div>
</section>
                	
                
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
                   



</body>
</html>