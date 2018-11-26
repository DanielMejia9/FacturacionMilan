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


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css"/>
<link rel="shortcut icon" href="../favicon.ico">
<script src="http://code.jquery.com/jquery-latest.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<script  type="application/javascript" src="../jscript/funciones.js"></script>



<title>Expediente del Cliente</title>
</head>
<body> 
<?php include("../include/menu_top.php")?>
<section id="contenido">
    <div class="container-fluid">
       
         <div class='fondo'>     
        <div class='row'> 
        	<div class="col-md-12">
                <h3 style="padding-top:12px;">Expediente del Clientes</h3>
            </div>
        </div>	
        <div class='row'>
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
                          <img src="../images/ico_doc.png" alt="...">
                          <div class="caption">
                            <h3><?php echo $mod[$i]['titulo'] ?></h3>
                            <p><?php echo substr($mod[$i]['descripcion'], 0, 200)  ?></p>
                            <p><a href="expediente.php?id=<?php echo $mod[$i]['codi_exp']?>&codi_clie=<?php echo $_GET["codi_clie"];?>">
                                <button class="btn btn-success" type="button">
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
                    <a  href="add_expediente.php?codi_clie=<?php echo $_GET["codi_clie"];?>"><img  src="../images/ico-add2.png"/></a> 
                    <label>Añadir</label> 
                </div>
            </div>
            </div>   
        </div>
  </section>      
       
                
</body>
</html>