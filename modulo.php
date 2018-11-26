<?php

include ("start.php");
include ("controle/vSession.php");

//Valor para modiicar automicamente el menu lateral
$atras = 0;
$activeClass= 0;
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

<script type="text/javascript" src="jscript/push.min.js"></script>
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico"/>
<link href="css/style_menu.css" rel="stylesheet" type="text/css" />
<link href="css/dashboard.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
<script src="jscript/modernizr.custom.js"></script>

<script>
    

Push.create("Bienvenidos a Admin", {
    body: "Sistema Administrativo",
    icon: '/images/icono.png',
    timeout: 4000,
    onClick: function () {
        window.focus();
        this.close();
    }
});

</script>


<title>Modulo</title>
</head>

<body>
    <?php 
    if($tipo =="1")
    {
        include("include/menu_top.php");
    }
    if($tipo =="2")
    {
        include("include/menu_top_user.php");
    }

    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?php
                    include ("include/menu_lateral_1.php");
                 ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <div class="fondo">
            <!--Div que contiene el tutilo de Acceso Directo-->
                <div style="background:rgb(245, 245, 245); text-align:left; padding: 5px 0px 0px 10px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 0px;">
                    <span style="color: #003E55; font-weight:bold;font-size:14pt;">Acceso Directos </span>
                </div>
                <?php 
                    if ($tipo==1)
                     {
                        ?>
                            <div class="row placeholders" >
                    <div class="col-xs-6 col-sm-2" >
                        <div class="ico_acceso">
                            <a href="empleados/registro_empleado.php"><img src="images/ico-emp.png" border="0" width="128" />
                            <div>Empleados</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="cliente/registro_cliente.php"><img src="images/ico-nom.png" border="0" width="128" /></a>
                            <div>Cliente</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="registro_contacto.php" ><img src="images/ico-contactos.png" border="0" width="128" /></a>
                            <div>Contactos</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="facturacion/facturacion.php?valor=1"><img src="images/ico-factura.png" border="0" width="128" /></a>
                            <div>Facturacion</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="presupuesto/presupuesto.php?valor=0"><img src="images/ico-presupuesto.png" border="0" width="128" /></a>
                            <div>Presupuesto</div>
                        </div>                    
                    </div>    
                    <div class="col-xs-6 col-sm-2">
                    <div class="ico_acceso">
                            <img src="images/ico-new.png" border="0" width="128" />
                            <div>Modulos</div>
                        </div>   
                        </div>             
                </div>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="recibo/recibo.php?valor=0"><img src="images/ico-recibos.png" border="0" width="128" />
                            <div>Emisión de Recibos</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="contabilidad/index.php" ><img src="images/ico-contabilidad.png" border="0" width="128" /></a>
                            <div>Contabilidad</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2" >
                        <div class="ico_acceso">
                            <img src="images/ico-cue.png" border="0" width="128" />
                            <div>Cuenta</div>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="expediente/h_expediente.php"><img src="images/ico-doc.png" border="0" width="128" /></a>
                            <div>Expediente</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <img src="images/ico-pagos.png" border="0" width="128" />
                            <div>Pagos</div>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="configuracion"><img src="images/ico-config.png" border="0" width="128" /></a>
                            <div>Ajustes</div>
                        </div>
                    </div>
                </div>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="contabilidad/index.php" ><img src="images/ico-soporte.png" border="0" width="128" /></a>
                            <div>Soporte</div>
                        </div>
                    </div>
                </div>      
                       <?php
                    }
                    if ($tipo==2)
                     {
                        ?>
                            <div class="row placeholders" >
                    <div class="col-xs-6 col-sm-2" >
                        <div class="ico_acceso">
                            <a href="empleados/registro_empleado.php"><img src="images/ico-emp.png" border="0" width="128" /></a>
                            <div>Empleados</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="cliente/registro_cliente.php"><img src="images/ico-nom.png" border="0" width="128" /></a>
                            <div>Cliente</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="registro_contacto.php" ><img src="images/ico-contactos.png" border="0" width="128" /></a>
                            <div>Contactos</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="facturacion/facturacion.php?valor=1"><img src="images/ico-factura.png" border="0" width="128" /></a>
                            <div>Facturacion</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="presupuesto/presupuesto.php?valor=0"><img src="images/ico-presupuesto.png" border="0" width="128" /></a>
                            <div>Presupuesto</div>
                        </div>                    
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="recibo/recibo.php?valor=0"><img src="images/ico-recibos.png" border="0" width="128" />
                            <div>Emisión de Recibos</div>
                        </div>
                    </div>
                    
                </div>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="contabilidad/index.php" ><img src="images/ico-contabilidad.png" border="0" width="128" /></a>
                            <div>Contabilidad</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2" >
                        <div class="ico_acceso">
                            <img src="images/ico-cue.png" border="0" width="128" />
                            <div>Cuenta</div>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="expediente/h_expediente.php"><img src="images/ico-doc.png" border="0" width="128" /></a>
                            <div>Expediente</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <img src="images/ico-pagos.png" border="0" width="128" />
                            <div>Pagos</div>
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="configuracion"><img src="images/ico-config.png" border="0" width="128" /></a>
                            <div>Ajustes</div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-2">
                    </div>
                </div>
                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-2">
                        <div class="ico_acceso">
                            <a href="contabilidad/index.php" ><img src="images/ico-soporte.png" border="0" width="128" /></a>
                            <div>Soporte</div>
                        </div>
                    </div>
                </div>      
                       <?php
                    }

                ?>
                
        </div>
    </div>
    </div>
 </div>   	
</body>
</html>