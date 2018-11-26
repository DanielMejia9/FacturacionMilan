<?php

include ("../start.php");

include ("../controle/vSession.php");

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
<title>Modulo</title>
</head>
<style>
        .caja{
            margin: auto;
            max-width: 250px;
            padding: 20px;
            border: 1px solid #BDBDBD;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: auto;
            margin-top: 40px;
            width: 1000px;
        }
    </style>
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
            <div class="fondo">
            <!--Div que contiene el tutilo de Acceso Directo-->
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Estadistica </span>
                </div>
                <br><br>
                <div class="row placeholders" >
                     <div class="col-md-4">
                            <label>Desde</label>
                            <input type="text" name="desde" id="desde" maxlength="10" size="6" class="demo form-control" />
                     </div>
                     <div class="col-md-4">
                            <label>Hasta</label>
                            <input type="text" name="hasta" id="hasta" maxlength="10" size="6" class="demo form-control" />
                     </div>
                     <div class="col-md-4">
                            <label>Año</label>
                            <select onChange="mostrarResultados(this.value);"  class="demo form-control">
                                <option value="0" selected>Seleccionar</option>
                            <?php
                                for($i=2017;$i<2020;$i++){
                                    if($i == 2017){
                                        echo '<option value="'.$i.'" >'.$i.'</option>';
                                    }else{
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                    }
                                }
                            ?>
                        </select>
                     </div>
                </div>
                <div class="resultados"><canvas id="grafico"></canvas></div>
        </div>
    </div>
    </div>
 </div>   	
</body>

<script type="text/javascript" src="estadistica/js/chartJS/Chart.min.js"></script>
<script>
            $(document).ready(mostrarResultados(2018));  
                function mostrarResultados(año){
                    $.ajax({
                        type:'POST',
                        url:'estadistica/controlador/procesar.php',
                        data:'año='+año,
                        success:function(data){

                            var valores = eval(data);

                            var e   = valores[0];
                            var f   = valores[1];
                            var m   = valores[2];
                            var a   = valores[3];
                            var ma  = valores[4];
                            var j   = valores[5];
                            var jl  = valores[6];
                            var ag  = valores[7];
                            var s   = valores[8];
                            var o   = valores[9];
                            var n   = valores[10];
                            var d   = valores[11];
							var ee   = valores[12];
                            var ff   = valores[13];
                            var mm   = valores[14];
                            var aa   = valores[15];
                            var mama  = valores[16];
                            var jj   = valores[17];
                            var jljl  = valores[18];
                            var agag  = valores[19];
                            var ss   = valores[20];
                            var oo   = valores[21];
                            var nn   = valores[22];
                            var dd   = valores[23];
                                
                            var Datos = {


                                type: 'radar',
                                    labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    datasets : [
                                        {
                                            fillColor : '#6aabf13d', //COLOR DE LAS BARRAS
                                            strokeColor : '#265a88', //COLOR DEL BORDE DE LAS BARRAS
                                            //highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            //highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
											pointColor : "#265a88",
											pointStrokeColor : "#265a88",
											pointHighlightFill : "#265a88",
											pointHighlightStroke : "#265a88",
                                            data : [e, f, m, a, ma, j, jl, ag, s, o, n, d]
                                        },
										{
                                            fillColor : '#f7464a91', //COLOR DE LAS BARRAS
                                            strokeColor : '#F7464A', //COLOR DEL BORDE DE LAS BARRAS
                                            //highlightFill : '#f7464a91', //COLOR "HOVER" DE LAS BARRAS
                                            //highlightStroke : '#F7464A)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
											pointColor : "#F7464A",
											pointStrokeColor : "#F7464A",
											pointHighlightFill : "#F7464A",
											pointHighlightStroke : "#F7464A",
                                            data : [ee, ff, mm, aa, mama, jj, jljl, agag, ss, oo, nn, dd]
                                        }
                                    ]
                                }
                                
                            var contexto = document.getElementById('grafico').getContext('2d');
                            //window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
							window.myLine = new Chart(contexto).Line(Datos, {responsive: true});
							
                        }
                    });
                    return false;
                }
    </script>
</html>