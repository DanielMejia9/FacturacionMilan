<?php

require_once("../class/class.php");
include("../start.php");
$conexion = new Conectar();
$conectar = $conexion->conecta();

include("../controle/vSession.php");
$atras = 1;

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>



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
		});*/
        
        $(function () {
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker").datepicker({
            dateFormat: 'dd/mm/yy',
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
                <?php
                    include ("../include/menu_lateral_1.php");
                 ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <form name="form_fact" id="form_fact" action="registrar_factura.php" method="post" class="fondo">
                   <div class="row">
                        <div class="col-md-6">
                            <h3>Presupuesto</h3>
                        </div>
                        <div class="col-md-2 col-md-offset-4">
                                Fecha: <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo form-control" />
                        </div> 
                   </div>
                   <div class="row">
                        <div class="col-md-3">
                             <?php   							
        						//recoge variable de la url
        						$valor = $_GET["valor"];
        						
        						//Realiza la consulta en la BD
        						$buscar = mysql_query("select * FROM tb_regi_cli WHERE codi_clie = '".$valor."'");
        							//Creamos el Array o Arreglo
        						$row = mysql_fetch_array($buscar);
                                
        
        						?>
                            	<input type="hidden" id="codigo-cliente" name="codigo-cliente" value="<?php echo $row["codi_clie"];?>" />
                                Nombre del Cliente:  
                               	 <input type="hidden" name="valSelect" id="valSelect"  />
                                 <select name="sele_clie" id="sele_clie" onchange="onSelectP(this.value)" value="<?php echo $row["codi_clie"];?>"  class="form-control" > 
        						<?php
        								//Consulta la BD 		
        								$respuesta=mysql_query("select codi_clie, nomb_clie from tb_regi_cli");
        								//Se realiza la condicion para saber el valor de la 
        								//variable $valor
        								if(($valor ==0))
        								{
        									echo '<option value="0" >Seleccione</option>';
        									while($select =mysql_fetch_array($respuesta)){
        										echo '
        											<option value="'.$select["codi_clie"].'"> 
        											'.$select["nomb_clie"].'</option> ';
        											}
        								}
        								else{
        										echo '<option  value="'.$row["codi_clie"].'">'.$row["nomb_clie"].'</option> ';
        											while($select =mysql_fetch_array($respuesta)){
        											
        											echo '<option value="'.$select["codi_clie"].'">'.$select["nomb_clie"].'</option>';
        											}
        										  }
        									
        									
        									?>
                                </select>
                                <input type="hidden" name="nombrecliente" id="nombrecliente"  value="<?php echo $row["nomb_clie"] ?>" />
                                
                            </div>
                            <div class="col-md-2">
                                Rif: <input type="text" name="rifEmp" value="<?php echo $row["rif_clie"] ?> " id="rifEmp" maxlength="12" size="15" class="form-control" />
                            </div>
                            <div class="col-md-1">
                                 NIT: <input type="text" name="nitEmp" value="<?php echo $row["nit_clie"] ?>" id="nitEmp" maxlength="15" size="15" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                Direcci&oacute;n: <input type="text" name="dirEmp" value="<?php echo $row["dire_clie"] ?>" id="dirEmp" maxlength="200" size="56" class="form-control" />
                            </div>
                              
                        </div> 
                        <div class="row">
                            
                            <div class="col-md-2">
                                Pais: <input type="text" name="paisEmp"  value="<?php echo $row["pais_clie"] ?>" id="paisEmp" maxlength="12" size="15" class="form-control" />
                            </div>
                            <div class="col-md-2">
                                Ciudad: <input type="text" name="ciuEmp" value="<?php echo $row["ciud_clie"] ?>" id="ciuEmp" maxlength="50" size="16" class="form-control" />
                            </div> 
                            <div class="col-md-2">
                                Estado: <input type="text" name="estEmp"  value="<?php echo $row["esta_clie"] ?>" id="estEmp" maxlength="12" size="19" class="form-control" />
                            </div>
                            <div class="col-md-2">
                                Telefonos*: <input type="text" name="telEmpr"   value="<?php echo $row["tele_clie"] ?>"id="telEmpr" maxlength="11" size="15" class="form-control" />
                            </div>
                            <div class="col-md-2">
                                Telefonos(opcional): <input type="text" name="telEmpropc"  value="<?php echo $row["tele_clie_opci"] ?>" id="telEmpropc" maxlength="11" size="15" class="form-control"  />
                            </div>
                            <div class="col-md-1">
                                Contr:<input type="text" name="contribuyente" id="contribuyente" value="<?php echo $row["cont_espe_clie"] ?>" maxlength="2" size="4" class="form-control" />
                            </div>
                            <div class="col-md-1">
                            IVA: <select name="selectiva" id="selectiva" class="form-control" >
                                            <option value="0">NO</option>
                                            <option value="1">SI</option>
                               			  </select>
                            </div>
                        </div>
                        <div class="row">
                            
                            
                            
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                Descrpcion de la Factura: <input type="text" name="descripcion" id="descripcion" size="80" class="form-control"  />
                            </div>
                            <div class="col-md-3">
                                Duracion: <select name="duracion" id="duracion"  class="form-control"  />
                                            <option value="2 dias habiles">2 dias habiles</option>
                                            <option value="5 dias habiles">5 dias habiles</option>
                                            <option value="10 dias habiles">10 dias habiles</option>
                                          </select>
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
                            <td align="">I.V.A (12%)</td>
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
                        <div class="col-md-3 col-md-offset-2">
                            <a href="#" target="_blank"  onclick="guardarPresupuesto();" class="btn btn-primary">Guardar PDF</a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" target="_blank" onclick="imprimirFactura();"  class="btn btn-primary">Imprimir</a>
                        </div>   
                    </div> 
                </div>
                </form>


        </div>
    </div>
 </div>   	
</body>
</html>