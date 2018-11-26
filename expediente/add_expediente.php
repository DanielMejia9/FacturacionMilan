<?php

include ("../start.php");
include ("../controle/vSession.php");
require_once ("../class/class.php");
$conecta = new Conectar();
$con = $conecta->conecta();
$clie = new Cliente();


if (isset($_POST["guardar"]) && $_POST["guardar"] == "si")
{
    $mod = $clie->guardarExpediente($_POST["codi_clie"], $_POST["titulo"], $_POST["descripcion"]);
}

//Valor para modiicar automicamente el menu lateral
$atras = 1;
$activeClass= 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>


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
<link rel="shortcut icon" href="../favicon.ico" />


<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<title>Expediente del Cliente</title>
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
                <div class="row placeholders">                
                	<div class="col-md-12">
                        <h3 style="padding-top:12px;">Expediente del Cliente</h3>
                    </div>
                </div>
                <form method="post" name="expediente" id="expediente" action="add_expediente.php">
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" />
                    </div>
                    <div class="form-group">
                        <label for="titulo">Descripcion:</label>
                        <textarea  rows="10" class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-primary" onclick="validaExpediente();">Guardar</button>
                        <button type="reset" class="btn btn-primary">Limpiar</button>
                        <input type="hidden" value="si"  name="guardar" id="guardar"/>
                        <input type="hidden" value="<?php echo $_GET["codi_clie"]; ?>" name="codi_clie" id="codi_clie"/>
                    </div>
                
                </form>
            </div>
            </div>
        </div>
   </div>

            
            
       
                
</body>
</html>