<?php
include("../start.php");
	  include("../class/class.php");
	  $conecta = new Conectar();
	  $con =  $conecta->conecta();
	  $add = new Cliente();

	  if(isset($_POST["anadir"]) and $_POST["anadir"]=="si")
		{
		//print_r($_POST);
		//print_r($_POST["codi_clie"]);
    $datepicker      = date('Y-m-d', strtotime($_POST["datepicker"]));
		$addCliente = $add->AnadirProducto($_POST["producto"],$_POST["categoria"],$_POST["marca"],$_POST["cantidad"],$_POST["costo"],$_POST["precio"],$_POST["minimo"],$_POST["puntaje"],$datepicker);
			exit;
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


<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="../css/bootstrap.min.css"">


<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="../jscript/bootstrap.min.js"></script>

<script  type="application/javascript" src="../jscript/funciones.js"></script>


<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script src="../jscript/jquery.ui.core.js"></script>
<script src="../jscript/jquery.ui.widget.js"></script>
<script src="../jscript/jquery.ui.datepicker.js"></script>

<link rel="stylesheet" href="../css/jquery.ui.all.css">
<link href="../css/style_menu.css" rel="stylesheet" type="text/css" />
<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<script>

     $(function () {
        $.datepicker.setDefaults($.datepicker.regional["es"]);
        $("#datepicker").datepicker({
            dateFormat: 'dd-mm-yy',
            firstDay: 1
        }).datepicker("setDate", new Date());
     });
</script>
<!--Libreria de Menu-->
<link rel="stylesheet" type="text/css" href="../css/component.css" />
<script src="../jscript/modernizr.custom.js"></script>


<title>Añadir Producto</title>
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
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Añadir Producto</span><br><br>
                    <div class="btnSuperior"><a href="registro_producto.php" class="btn btn-primary">Productos</a></div>
                </div>
                <br><br><br><br>
                <div class="row placeholders">
                     <form name="form_producto" id="form_producto" action="add_producto.php" method="post" autocomplete="off">


                       <div class="row placeholders">
                             <div class="col-md-4">
                               <label>Descripción: </label>
                               <input type="text" name="producto" id="producto"  maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-2">
                               <label>Puntaje: </label>
                               <input type="text" name="puntaje" id="puntaje"  maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                               <label>Categoria: </label>
                               <select name="categoria" id="categoria" class="form-control" >
                                  <?php
                                      //Consulta la BD
                                      $respuesta=mysql_query("select * from tb_categorias_productos order by categoria");
                                      //Se realiza la condicion para saber el valor de la
                                      //variable $valor
                                      if(($valor ==0))
                                      {
                                        echo '<option value="0" >Seleccione</option>';
                                        while($select =mysql_fetch_array($respuesta)){
                                          echo '
                                            <option value="'.$select["id_categoria"].'">
                                            '.$select["categoria"].'</option> ';
                                            }
                                      }
                                      else{
                                          echo '<option  value="'.$row["id_categoria"].'">'.$row["categoria"].'</option> ';
                                            while($select =mysql_fetch_array($respuesta)){

                                            echo '<option value="'.$select["id_categoria"].'">'.$select["categoria"].'</option>';
                                            }
                                            }


                                        ?>
                                </select>
                             </div>
                             <div class="col-md-3">
                               <label>Marca: </label>
                               <select name="marca" id="marca" class="form-control" >
                                  <?php
                                      //Consulta la BD
                                      $respuesta=mysql_query("select * from tb_marcas order by descripcion_marca");
                                      //Se realiza la condicion para saber el valor de la
                                      //variable $valor
                                      if(($valor ==0))
                                      {
                                        echo '<option value="0" >Seleccione</option>';
                                        while($select =mysql_fetch_array($respuesta)){
                                          echo '
                                            <option value="'.$select["id_marca"].'">
                                            '.$select["descripcion_marca"].'</option> ';
                                            }
                                      }
                                      else{
                                          echo '<option  value="'.$row["id_marca"].'">'.$row["descripcion_marca"].'</option> ';
                                            while($select =mysql_fetch_array($respuesta)){

                                            echo '<option value="'.$select["id_marca"].'">'.$select["descripcion_marca"].'</option>';
                                            }
                                            }


                                        ?>
                                </select>
                             </div>
                           </div>
                           <div class="row placeholders">
                             <div class="col-md-2">
                               <label>Cantidad: </label>
                               <input type="text" name="cantidad" id="cantidad"  maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-2">
                               <label>Costo: </label>
                               <input type="text" name="costo" id="costo"  maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-2">
                               <label>Precio: </label>
                               <input type="text" name="precio" id="precio"  maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                               <label>Mínimo Stock: </label>
                               <input type="text" name="minimo" id="minimo"  maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                                <label>Fecha: </label>
                                <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo form-control"/>
                             </div>
                       </div>


                       <br />
                       <div class="row placeholders">
                             <div class="col-md-3 col-md-offset-3">
                                <input  type="hidden" name="anadir" id="anadir"  value="si" />
                                <a class="btn btn-primary" name="volver"   href="javascript:history.go(-1);"/>Volver</a>
                             </div>
                             <div class="col-md-3">
                                <a class="btn btn-primary" name="username" onclick="validaProducto();"/>Guardar</a>
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
