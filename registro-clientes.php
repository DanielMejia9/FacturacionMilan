<?php
  
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

<title>Añadir Cliente</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-1"></div>
        <div class="fondo col-md-10">

          <div style="background:rgb(245, 245, 245); text-align:center; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 5px;">
            <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Registro de Clientes MilanBC</span><br><br>
          </div>

          <br><br>

          <div class="row placeholders">
            <form name="form_registro" id="form_registro" action="registro-clientes.php" method="post">
              <div class="row placeholders">
                <div class="col-md-3">
                  <label>Nombre </label>
                  <input type="text" name="nom_cliente" id="nom_cliente"  maxlength="250" size="50" class="form-control" />
              </div>
                <div class="col-md-3">
                  <label>Apellido </label>
                  <input type="text" name="ape_cliente" id="ape_cliente"  maxlength="250" size="50" class="form-control" />
                </div>
                <div class="col-md-3">
                  <label>Número de identificación</label>
                  <input type="text" name="codCliente" id="codCliente" maxlength="12" size="10" class="form-control"/>
                </div>
                <div class="col-md-3">
                  <label>Fecha de nacimiento </label>
                  <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo form-control"/>
                </div>
              </div> 
              <br>
              <div class="row placeholders">
                <div class="col-md-4">
                  <label>Dirección</label>
                  <input type="text" name="dirEmp" id="dirEmp" maxlength="200" size="61" class="form-control"/>
                </div>
                <!--<div class="col-md-3">
                  <label>Pais:</label>
                  <input type="text" name="paisEmp"  id="paisEmp" maxlength="12" size="7" class="form-control"/>
                </div>-->
                <div class="col-md-4">
                  <label>Ciudad </label>
                  <input type="text" name="ciuEmp"  id="ciuEmp" maxlength="50" size="7" class="form-control"/>
                </div>
                <div class="col-md-4">
                  <label>Estado </label>
                  <input type="text" name="estEmp"  id="estEmp" maxlength="12" size="7" class="form-control"/>
                </div>
              </div>
              <br>  
              <div class="row placeholders">
                <div class="col-md-6">
                  <label>Telefonos</label>
                  <input type="text" name="telEmpr"  id="telEmpr" maxlength="16" size="10" class="form-control"/>
                </div>
                <div class="col-md-6">
                  <label>Telefonos(opcional)</label>
                  <input type="text" name="telEmpropc" id="telEmpropc" maxleng6h="14" size="10" class="form-control"/>
                </div>
                <!--<div class="col-md-4">
                  <label>Contribuyente: </label>
                  <select name="contEmp" id="contEmp" class="form-control">
                    <option value="-">-</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </select>
                </div>-->
              </div>
              <br>  
              <div class="col-md-12" style="background:rgb(245, 245, 245); text-align:center; padding: 5px 0px 0px 0px; height:40px; border-bottom: 1px  #C0C0C0 solid;border-radius: 5px;">
                <span style="color: #333333; font-weight:bold;font-size:14pt;padding: 0 0 0 10px;">Datos de Acceso</span><br>
              </div>
              <div class="row placeholders">
                <div class="col-md-6">
                  <label>Contraseña</label>
                  <input type="text" name="telEmpr"  id="telEmpr" maxlength="16" size="10" class="form-control"/>
                </div>
              </div> 
              <br />
              <div class="row placeholders">
                <div class="col-md-3 col-md-offset-3">
                  <input  type="hidden" name="anadir" id="anadir"  value="si" />
                  <a class="btn btn-primary" name="volver"   onclick="window.location='registro_cliente.php'"/>Regresar a MilanBC</a>
                </div>
                <div class="col-md-3">
                  <a class="btn btn-primary" name="username" onclick="validaReg();"/>Enviar datos</a>
                </div>
              </div>
            </form>
          </div>
      <div class="col-md-1"></div>
    </div>
    </div>
  </div>
</body>
</html>