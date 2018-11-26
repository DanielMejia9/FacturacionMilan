<?php include("../start.php");
	  include("../class/class.php");
      include("../controle/vSession.php");
      
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $cliente = new Cliente();
	  
	  
	  
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />




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


<script src="../jscript/Chart.js"></script>


<title>Libro de Gastos</title>
</head>
<body onLoad="filtrar();">

    <div style="width: 50%">
            <canvas id="canvas" height="450" width="600"></canvas>
    </div>

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
                <div class="row placeholders">
                    <div class="col-md-12">
                         <h1>Estadística de Gastos</h1>
                     </div>
                     <div class="resultados"><canvas id="grafico"></canvas></div>
                </div>
                </form>
                <hr />
               </div>
               
            </div>
        </div>
    </div>
</body>
 
 <script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
        var lineChartData = {
            labels : ["January","February","March","April","May","June","July"],
            datasets : [
                {
                    label: "My First dataset",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                },
                {
                    label: "My Second dataset",
                    fillColor : "rgba(151,187,205,0.2)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(151,187,205,1)",
                    data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
                }
            ]

        }

    window.onload = function(){
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myLine = new Chart(ctx).Line(lineChartData, {
            responsive: true
        });
    }

    </script>
</html>