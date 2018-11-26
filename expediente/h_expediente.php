<?php 
      include("../start.php");
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

<title>Expediente - Cliente</title>
</head>
<body>
<?php 
    if($tipo =="1")
    {
        include("../include/menu_top.php");
    }
    if($tipo =="2")
    {
        include("../include/menu_top_user.php");
    }

    ?>    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?php
                    include ("../include/menu_lateral_1.php");
                 ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Expediente - Selecciones el Cliente</span><br><br>
                </div>
                <br><br>
                <div class="row placeholders">
                    <div class="table-responsive fondo">  
                        <div class="table-responsive">             
                        <table class="table table-striped">
                             <thead>
                                <tr>
                                    <th style="text-align: center;">Codigo</th>
                                    <th style="text-align: center;">Cliente</th>
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
                        </tbody>
                        </table>
                        </div>
                        </div> 
                </div>            
            </div>
         </div>                                
    </div>
            
   	
                
                   



</body>
</html>