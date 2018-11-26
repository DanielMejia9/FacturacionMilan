<?php 
include("../start.php");
include("../controle/vSession.php");
require_once("../class/class.php");
$conecta = new Conectar();
$con =  $conecta->conecta();
$clie = new Cliente();

if(isset($_POST["guardar"]) and $_POST["guardar"]=="si")
{
	//print_r($_POST);
	//print_r($_POST["codi_clie"]);
	$clie->EditarCliente($_POST["codi_clie"],$_POST["nom_cliente"],$_POST["rifEmp"],$_POST["nitEmp"],$_POST["datepicker"],$_POST["dirEmp"],$_POST["paisEmp"],$_POST["ciuEmp"],$_POST["estEmp"],$_POST["telEmpr"],$_POST["telEmpropc"],$_POST["contEmp"]);
	exit;
	}
$mod = $clie->listarExpediente($_GET["codi_clie"]);

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
<link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<!-- Optional theme -->
<link rel="stylesheet" href="../css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="../jscript/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script  type="application/javascript" src="../jscript/funciones.js"></script>

<link rel="stylesheet" href="../css/style.css"/>
<link href="../css/dashboard.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico"/>


<title>Expediente del Cliente</title>
</head>
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
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Expediente del Clientes</span><br><br>
                </div>
                <br><br>
               <div class='row placeholders'>
                    <?php for($i=0; $i<sizeof($mod); $i++)
                    { 
                    ?>
                           <!--<div class='col-md-3 text-center'>
                           <a href="expediente.php?id=<?php echo $mod[$i]['codi_exp'] ?>">
                           <img src="../images/ico_doc.png" />
                           <br />
                           <label><?php echo $mod[$i]['titulo'] ?></label>
                           </a>
                           </div>-->
                           
                              <div class="col-md-3 col-sm-6">
                                <div class="thumbnail">
                                  <div class="caption">
                                    <h3><?php echo $mod[$i]['titulo'] ?></h3>
                                    <!--<p><?php echo substr($mod[$i]['descripcion'], 0, 100)  ?></p>-->
                                    <p><a href="expediente.php?id=<?php echo $mod[$i]['codi_exp']?>&codi_clie=<?php echo $_GET["codi_clie"];?>">
                                        <button class="btn btn-primary" type="button">
                                          Registro <span class="badge"><?php echo $mod[$i]['codi_exp'] ?></span>
                                        </button>
                                        </a>
                                    </p>
                                  </div>
                                </div>
                              </div>
                           
                    <?php
                    }
                    ?>
                        <div class="col-md-1 text-center">
                            <a  class="btn btn-primary" href="add_expediente.php?codi_clie=<?php echo $_GET["codi_clie"];?>">Añadir</a> 
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>



        
           
       
                
</body>
</html>