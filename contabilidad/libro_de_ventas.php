<?php include("../start.php");
	  include("../class/class.php");
      include("../controle/vSession.php");
      
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $cliente = new Cliente();
	  
//Valor para modiicar automicamente el menu lateral
$atras = 1;
$activeLibroV= 1;	  
	  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />


<script src="http://code.jquery.com/jquery-latest.js"></script>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css">


<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../jscript/bootstrap.min.js"></script>

<link rel="stylesheet" href="../css/style.css"/>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico"/>
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script language ="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<script type="text/javascript" src="../libreria-filtro/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../libreria-filtro/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="../libreria-filtro/js.js"></script>

<!--Libreria Calendario-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<link rel="stylesheet" href="../css/jquery.ui.all.css"/>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<script>

     //Codigo del calendario    
        /* $(function() {
		$("#desde").datepicker({
		//showOn: "button",
		//buttonImage: "../images/calendar.gif",
		//buttonImageOnly: true
		});
		});
        
        $(function() {
		$("#hasta").datepicker({
		//showOn: "button",
		//buttonImage: "../images/calendar.gif",
		//buttonImageOnly: true
		});
		});*/
                
        $(function () {
        $("#desde").datepicker({
            dateFormat: 'dd-mm-yy',
        onClose: function (selectedDate) {
        $("#hasta").datepicker("option", "minDate", selectedDate);
        
        }
        });
        $("#hasta").datepicker({
            dateFormat: 'dd-mm-yy',
        onClose: function (selectedDate) {
        $("#desde").datepicker("option", "maxDate", selectedDate);
        
        }
        });
        });
                        
</script>
<!-- Fin Libreria Calendario-->



<title>Libro de Venta</title>
</head>
<body onLoad="filtrar();">
    <?php include("../include/menu_top.php")?>
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?php
                    include ("../include/menu_lateral_1.php");
                 ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <form id="frm_filtro" name="frm_filtro" method="post" action="">
               <input type="hidden" name="cod_unitrab" id="cod_unitrab" />
               <div class="fondo">
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Libro de Ventas </span>
                </div>
                <br><br>
                <div class="row placeholders"> 
                     <!--<div class="col-md-2">
                            <label>Numero Factura</label>
                            <input type="text" name="factura" id="factura" maxlength="10" size="6" class="form-control" />
                     </div>-->
                     <div class="col-md-2">
                            <label>Desde</label>
                            <input type="text" name="desde" id="desde" maxlength="10" size="6" class="demo form-control" />
                     </div>
                     <div class="col-md-2">
                            <label>Hasta</label>
                            <input type="text" name="hasta" id="hasta" maxlength="10" size="6" class="demo form-control" />
                     </div>
                     <!--<div class="col-md-2">
                            <label>Cliente</label>
                            <select id="cliente" name="cliente" class="form-control">
                                <option value="">--</option>	
                                <?php
        						$sql = "select * from tb_regi_cli"; 
        						$result = mysql_query($sql);
        						//if (mysqli_num_rows($result) > 0) {
                                while($row = mysql_fetch_assoc($result)){
                                ?>
        							<option value="<?php echo $row['codi_clie']; ?>">
        							<?php echo $row['nomb_clie']; ?>
        							</option>
                                <?php
                                }
        						//}
                                ?>	 
                            </select> 
                     </div>-->

                     <div class="col-md-2 col-sm-12 altoBtn">
						<a type="button" id="General" class="btn btn-primary" onclick="reporteGeneralPDF();">General</a>
					</div> 
                    <div class="col-md-2 col-sm-12 altoBtn">
                        <a type="button" id="libro" class="btn btn-primary" onclick="reportePDF();">Detallado</a>
                    </div>
                    <div class="col-md-2 col-sm-12 altoBtn">
                        <a type="button" id="btnfiltrar" class="btn btn-primary" >Buscar</a>
                    </div>
                    <div class="col-md-2 col-sm-12 altoBtn">
                        <a type="button" id="btncancel" class="btn btn-primary">Todos</a>
                    </div>            
                </div>
                </form>
                <div class="row placeholders cabeceraTable"> 
                    	<div class="col-md-2 col-sm-12">
                            <label>N. Factura</label>
						</div>
                        <div class="col-md-3 col-sm-12">
                            <label>Cliente</label>
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label>Fecha Emision</label>
						</div>
                        <div class="col-md-1 col-sm-12">
                            <label>Codigo</label>
						</div>
                        <div class="col-md-1 col-sm-12">
                            <label>Monto</label>
                        </div>
                        <div class="col-md-1 col-sm-12">
                            <label>I.V.A</label>
						</div> 
                        <div class="col-md-2 col-sm-12">
                            <label>Total General</label>
						</div>
                        <div class="col-md-1 col-sm-12">
                            <label></label>
                        </div>

                </div> 
                <div class="row placeholders"> 
                    <div id="resultado" class="container-fluid"></div>
                </div>   
               </div>
               
            </div>
        </div>
    </div>

</body>
</html>