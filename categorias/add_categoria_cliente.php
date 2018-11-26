<?php 
error_reporting(E_ALL);
ini_set('display_errors', '1');

include("../start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $add = new Cliente();
	  
	  if(isset($_POST["anadir"]) and $_POST["anadir"]=="si")
		{
      $nombre_img = $_FILES['icono']['name'];
      $tipo = $_FILES['icono']['type'];
      //$tamano = $_FILES['icono']['size'];
      if ($nombre_img == !NULL) {
        $directorio = $_SERVER['DOCUMENT_ROOT'].'/images/';
        //move_uploaded_file($_FILES['icono']['tmp_name'],$directorio.$nombre_img);
		    $addCategoria = $add->AddCategoriaClientes($_POST["nombre"],$_POST["puntos"],$nombre_img);
			  exit;
      }
		}
	  include("../controle/vSession.php");

//Valor para modiicar automicamente el menu lateral
$atras = 1;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>


<script src="http://code.jquery.com/jquery-latest.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="../jscript/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script  type="application/javascript" src="jscript/funciones.js"></script>


<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script  type="application/javascript" src="../jscript/funciones.js"></script>
<script type="text/javascript" src="../jscript/jquery-1.4.2.min.js"></script>
<script language="javascript" src="../jscript/jquery-1.3.min.js"></script>
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="../css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<script>

     //Codigo del calendario    
     $(function() {
		$( "#datepicker" ).datepicker({
		//showOn: "button",
		//buttonImage: "../images/calendar.gif",
		//buttonImageOnly: true
		});
		});
</script>
<!--Libreria de Menu-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>


<title>Añadir Categoria</title>
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
              <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Datos del Cliente</span><br><br>
            </div>
            <br><br>
            <div class="row placeholders">
              <form name="form_cat" id="form_cat" action="add_categoria_cliente.php" method="post" enctype="multipart/form-data">
                <div class="row placeholders">
                  <div class="col-md-6">
                    <label>Nombre: </label>
                    <input type="text" name="nombre" id="nombre"  maxlength="250" size="50" class="form-control" />
                  </div>
                  <div class="col-md-6">
                    <label>Puntos: </label>
                    <input type="text" name="puntos" id="puntos"  maxlength="250" size="50" class="form-control" />
                  </div>
                </div>
                <br />
                <div class="row placeholders">
                  <div class="col-md-12">
                    <label>Icono: </label>
                    <input type="file" name="icono" id="icono"  maxlength="250" size="50" class="form-control" />
                  </div>
                </div>
                <br />
                <div class="row placeholders">
                  <div class="col-md-3 col-md-offset-3">
                    <input  type="hidden" name="anadir" id="anadir"  value="si" />
                    <a class="btn btn-primary" name="volver" onclick="window.location='registro_categoria.php'"/>Volver</a>
                  </div>
                  <div class="col-md-3">
                    <a class="btn btn-primary" name="username" onclick="validaRegCat();"/>Guardar</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>     
</body>
</html>