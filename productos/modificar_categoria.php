<?php 
include("../start.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$cate = new Productos();

if(isset($_POST["guardar"]) and $_POST["guardar"]=="si")
{
	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
  $datepicker      = date('Y-m-d', strtotime($_POST["datepicker"]));
  $cate->EditarCategoria($_POST["id"],$_POST["nom_categoria"],$_POST["status"],$datepicker);
	exit;
	}
$mod = $cate->ListarCategoria($_GET["id"]);


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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
      dateFormat: 'dd-mm-yy',
		//showOn: "button",
		//buttonImage: "../images/calendar.gif",
		//buttonImageOnly: true
		});
		});
</script>
<!--Libreria de Menu-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>


<title>Categoria</title>
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
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Categoria</span><br><br>
                </div>
                <br><br>
                <div class="row">
                     <form name="form_categoria" id="form_categoria" action="modificar_categoria.php" method="post">
                       <div class="row">
                             <div class="col-md-4">
                               <label>Nombre:</label>
                               <input type="text" name="nom_categoria" id="nom_categoria" value="<?php echo $mod[0]['categoria']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-4">
                               <label>Status:</label>
                               <select name="status" id="status" class="demo form-control">
                                  <option value=""></option>
                                  <option value="0">Desactivar</option>
                                  <option value="1">Activa</option>
                               </select>
                             </div>
                             <div class="col-md-4">
                                <label>Fecha: </label>
                                <input type="text" name="datepicker" value="<?php echo  date('d-m-Y', strtotime($mod[0]['fecha_creacion']));?>" id="datepicker" maxlength="10" size="6" class="demo form-control"/>
                             </div>
                       </div> 
                       <br />
                       <div class="row">
                             <div class="col-md-4 col-md-offset-4">
                              <input type="hidden" name="guardar" value="si" />
                              <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>" />
                                <a class="btn btn-primary" name="username" onclick="mCategoria();"/>Guardar</a>
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