<?php 
include("../start.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$clie = new Cliente();


$mod = $clie->detalleExpediente($_GET["id"]);

if (isset($_POST["guardar"]) && $_POST["guardar"] == "si")
{
    $mod = $clie->updateExpediente($_GET["id"], $_POST["titulo"], $_POST["descripcion"],$_GET["codi_clie"]);
}

//Valor para modiicar automicamente el menu lateral
$atras = 1;
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

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script  type="application/javascript" src="../jscript/funciones.js"></script>

<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico"/>

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>


<title>Expediente del Cliente</title>
</head>
<body class="dt-example">
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
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Expediente del Clientes</span><br><br>
                </div>
                <br><br>
                <div class='row placeholders'>
                    
                       <?php for($i=0; $i<sizeof($mod); $i++)
                        { 
                            ?>
                            <!--<div class="col-md-12">	
                                <input type="text" class="form-control" value="<?php echo $mod[$i]['titulo'] ?>" />
                            </div>
                            <br /><br />
                            <div class="col-md-12">	
                                <textarea  rows="10"><?php echo $mod[$i]['descripcion'] ?></textarea>
                            </div>-->
                            
                            
                            
                            <form method="post" name="actualiza" id="actualiza" action="expediente.php?id=<?php echo $_GET["id"]?>&codi_clie=<?php echo $_GET["codi_clie"]?>">
                                <div class="form-group">
                                    <label for="titulo">Titulo:</label>
                                    <input type="text"  value="<?php echo $mod[$i]['titulo'] ?>" class="form-control" id="titulo" name="titulo" placeholder="Titulo" />
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Descripcion:</label>
                                    <textarea  rows="10" class="form-control" id="descripcion" name="descripcion"><?php echo $mod[$i]['descripcion'] ?></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-primary" onclick="updateExpediente();">Guardar</button>
                                    <button type="reset" class="btn btn-primary">Limpiar</button>
                                    <input type="hidden" value="si"  name="guardar" id="guardar"/>
                                </div>
                            </form>
                            <?php
                            }
                        ?>
                    
                </div>                
            </div>
        </div>
        </div>
</div>          
</body>
</html>