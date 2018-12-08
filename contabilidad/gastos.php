<?php

require_once("../class/class.php");
include("../start.php");
$conexion = new Conectar();
$conectar = $conexion->conecta();

include("../controle/vSession.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico"/>

<script src="http://code.jquery.com/jquery-latest.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="../jscript/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<link rel="stylesheet" href="../css/jquery.ui.all.css"/>

<script src="../jscript/modernizr.custom.js"></script>

<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script type="text/javascript" src="../jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<script>

     /*//Codigo del calendario    
     $(function() {
		$( "#datepicker" ).datepicker({
		//showOn: "button",
		//buttonImage: "../images/calendar.gif",
		//buttonImageOnly: true
		});
		});
        */
        
        $(function () {
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            firstDay: 1
        }).datepicker("setDate", new Date());
     });
</script>


<title>Modulo</title>
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
                <ul class="nav nav-sidebar">
                    <li class="active"><a href="gastos.php">Cuenta de Gastos <span class="sr-only">(current)</span></a></li>
                    <li><a href="libro_de_gastos.php">Reporte de Gastos</a></li>
                  </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <form name="form_gastos" id="form_gastos" action="registrar_gastos.php" method="post" class="fondo">
                   <div class="row">
                        <?php
                                $numeroGastos = mysql_query("select codi_gastos FROM tb_gastos  ORDER BY codi_gastos DESC LIMIT 1");
                                $r = mysql_fetch_array($numeroGastos);
                                
                        ?>
                        <div class="col-md-6">
                            <h3>Cuenta de Gastos - Pasivos </h3>
                        </div>
                        <div class="col-md-2">
                            IVA: <select name="selectiva" id="selectiva" class="form-control" >
                                            <option value="0">NO</option>
                                            <option value="1">SI</option>
                                          </select>
                            </div>
                        <div class="col-md-2">
                        Numero de Factura: <input type="text" value="<?php echo $r["codi_gastos"] + 1; ?>" name="numero_factura" id="numero_factura" size="5"  class="form-control" />
                        </div>
                        <div class="col-md-2">
                                Fecha: <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo form-control" />
                        </div> 
                   </div>
                        <br />
                        <table name="factura" id="factura" class="descFact table table-hover table-bordered" border="0"   align="center" rules="all">
                             <tr height="20px" style="background:rgba(51, 51, 51, 0.82); color:#FFF; font-weight:bold;">	
                                 <td width="" align="center"><div><b>Cantidad</b></div></td>
                                 <td width="" align="center"><div><b>Descripcion</b></div></td>
                                 <td width="" align="center"><div><b>Precio</b></div></td>
                                 <td width="" align="center"><div><b>Total</b></div></td>
                             </tr>
                    
                    
                <?php
        
        		$sumaTotal = 0;
        		$indice = 1;
        		$multi = 10;
        		$t = 0;
        		$z = 1;
        		//variable para identificar el valor de las columnas
                $c = 0;
        		for ($i = 1; $i <= $multi; $i++)
        		{
        			//$i= $i + 1;
        			echo "<tr>";			
        			
        			for($j = 1; $j <= $indice; $j++){
        			$t = $t + 1;
        			$z = $z + 1;
                    //variable para identificar el valor de las columnas
                    $c = $c + 1;
        			?>
        			<input type="hidden" name="identy"  id="identy" value="<?php echo $t?>" />
        			
        			<td width="" align="center">
        				<input  type="text"  class="inputTxt" name="txtCant<?php echo $t?>" id="txtCant<?php echo $t?>"  onkeypress="return validarn(event)" onKeyup="suma(<?php echo $t?>,<?php echo $z?>)"/>
        			</td>
                    <td width="" align="left">
        				<input type="text" name="txtDesc<?php echo $t?>" class="inputDes" id="txtDesc<?php echo $t?>" />
        			</td>
        			<td width="" align="center">
        				<input type="text" name="txtPrec<?php echo $t?>"  class="inputTxt" id="txtPrec<?php echo $t?>" onkeypress="return validarn(event)" onmousemove="sumaTotales()" onKeyup="suma(<?php echo $t?> , <?php echo $z?>)"/>
        			</td>
                    <td id="idCol<?php echo $c;?>" width="" align="center">
                    	<input type="text" name="txtTota<?php echo $t?>" class="inputTxt" value=""   id="txtTota<?php echo $t?>" />
                        <input type="hidden" name="valorsuma<?php echo $t?>" id="valorsuma<?php echo $t?>" value="0"/>
                        <input type="hidden" name="registrarGast" id="registrarGast" value="1"/>
                    </td>
        
                    
                    <?php
        			
        			
        			}
        
        			echo "</tr>";
        		
        			}
        			
        			
        			
        			
        			?>
                     <tr>
                        	<td  colspan="2"></td>
                            <td align="">Sub - Total</td>
                            <td align="" ><input type="text" class="inputTxt" id="subTotal"  name="subTotal" /></td>
                            <!--<td align="" ><input type="text" class="inputTxt" id="subTotal" value="<?php echo $sumaTotal?>"/></td>-->
                       </tr>
                       <tr>
                        	<td  colspan="2"></td>
                            <td align="">I.V.A (19%)</td>
                            <td align=""><input type="text" class="inputTxt" id="ivaRes" name="ivaRes"/></td>
                            
                       </tr>
                       <tr>
                        	<td  colspan="2"></td>
                            <td align="">Total General</td>
                            <td align=""><input type="text" class="inputTxt" id="genTotal" name="genTotal"/></td>
                            
                       </tr>
                    
                    <?php
            		echo "</table>";
        		?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="#" onclick="validarGastos();"  class="btn btn-primary">Registrar</a>
                        </div>    
                    </div> 
                </div>
                </form>


        </div>
    </div>
 </div>   	
</body>
</html>