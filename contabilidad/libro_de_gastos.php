<?php include("../start.php");
	  include("../class/class.php");
      include("../controle/vSession.php");
      
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $cliente = new Cliente();
	  
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



<title>Libro de Gastos</title>
</head>
<body onLoad="filtrar();">
    <?php include("../include/menu_top.php")?>
    
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li class=""><a href="javascript:history.go(-1);">Atras</a><span class="sr-only">(current)</span></a></li>
                    <li><a href="gastos.php">Cuenta de Gastos <span class="sr-only">(current)</span></a></li>
                    <li class="active"><a href="libro_de_gastos.php">Reporte de Gastos</a></li>
                    <!--li><a href="estadistica_de_gastos.php">Estadística de Gastos</a></li-->
                    
                  </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
               <form id="frm_filtro" name="frm_filtro" method="post" action="">
               <input type="hidden" name="cod_unitrab" id="cod_unitrab" />
               <div class="fondo">
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Reporte de Gastos</span>
                </div>
                <br><br>
                <div class="row placeholders">
                     <div class="col-md-2">
                            <label>Desde</label>
                            <input type="text" name="desde" id="desde" maxlength="10" size="6" class="demo form-control" />
                     </div>
                     <div class="col-md-2">
                            <label>Hasta</label>
                            <input type="text" name="hasta" id="hasta" maxlength="10" size="6" class="demo form-control" />
                     </div>
                     
                     <div class="col-md-1 col-sm-12 altoBtn">
						<a type="button" id="General" class="btn btn-primary" onclick="reporteGeneralGastoPDF();">General</a>
					</div> 
                    <div class="col-md-1 col-sm-12 altoBtn">
                        <a type="button" id="libro" class="btn btn-primary" onclick="reporteDetalladoGastosPDF();">Detallado</a>
                    </div>                   
                </div>
                </form>
               </div>
               
            </div>
        </div>
    </div>

</body>
</html>