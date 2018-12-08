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
  $cate->EditarProducto($_POST["id"],$_POST["producto"],$_POST["categoria"],$_POST["marca"],$_POST["cantidad"],$_POST["costo"],$_POST["precio"],$_POST["minimo"],$datepicker);
  exit;
	}
$mod = $cate->ListarProductos($_GET["id_producto"]);


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
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Producto</span><br><br>
                    <div class="btnSuperior"><a href="registro_producto.php" class="btn btn-primary">Productos</a></div>
                </div>
                <br><br><br><br>
                <div class="row">
                     <form name="form_producto" id="form_producto" action="modificar_producto.php" method="post">
                       <div class="row">
                            <div class="col-md-3">
                               <label>ID:</label>
                               <input type="text" name="" id="" value="<?php echo $mod[0]['id_producto']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                               <label>Producto:</label>
                               <input type="text" name="producto" id="producto" value="<?php echo $mod[0]['descripcion_producto']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                               <label>Categoria:</label>
                               <select name="categoria" id="categoria" class="form-control" > 
                                  <?php
                                      //Consulta la BD    
                                      $respuesta=mysql_query("select * from tb_categorias_productos order by categoria");
                                      //Se realiza la condicion para saber el valor de la 
                                      //variable $valor
                                      $valor=0;
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
                                 <label>Marca:</label>
                                  <select name="marca" id="marca" class="form-control" > 
                                  <?php
                                      //Consulta la BD    
                                      $respuesta=mysql_query("select * from tb_marcas order by descripcion_marca");
                                      //Se realiza la condicion para saber el valor de la 
                                      //variable $valor
                                      $valor=0;
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
                             <div class="row">
                              
                             <div class="col-md-2">
                               <label>Cantidad:</label>
                               <input type="text" name="cantidad" id="cantidad" value="<?php echo $mod[0]['cantidad_producto']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-2">
                               <label>Costo:</label>
                               <input type="text" name="costo" id="costo" value="<?php echo $mod[0]['costo_producto']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-2">
                               <label>Precio:</label>
                               <input type="text" name="precio" id="precio" value="<?php echo $mod[0]['precio_producto']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                               <label>Mínimo Stock:</label>
                               <input type="text" name="minimo" id="minimo" value="<?php echo $mod[0]['minimo_stock']; ?>" maxlength="250" size="50" class="form-control" />
                             </div>
                             <div class="col-md-3">
                                <label>Fecha: </label>
                                <input type="text" name="datepicker" value="<?php echo  date('d-m-Y', strtotime($mod[0]['fecha_creacion']));?>" id="datepicker" maxlength="10" size="6" class="demo form-control"/>
                             </div>
                       </div> 
                       <br />
                       <div class="row">
                             <div class="col-md-4 col-md-offset-4">
                              <input type="hidden" name="guardar" value="si" />
                              <input type="hidden" name="id" value="<?php echo $_GET["id_producto"] ?>" />
                                <a class="btn btn-primary" name="username" onclick="mProducto();"/>Guardar</a>
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