<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico"/>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script  type="application/javascript" src="jscript/funciones.js"></script>
<title>Sistema Administrativo</title>
</head>

<body class="login">   



<div class="container">
  
  <div class="row" id="pwd-container">
    
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form id="form_ing" name="form_ing" method="post" action="validar.php" role="login">
          <img src="images/logo.png" class="img-responsive" alt="" />
          <center>
            <label class="etiqueta">FACTURACIÓN</label>
          </center>
          <input type="text" placeholder="Usuario" size="15" id="usuario" name="usuario" class="form-control input-lg" />
          <input type="password" placeholder="Contraseña" id="password" name="password" size="15"  class="form-control input-lg"/>
          <input type="hidden" value="enviar" name="valor" id="valor" />
          
          <div class="pwstrength_viewport_progress"></div>
          
          <input type="submit" value="Entrar" id="btnEntrar" onclick="validarUser();" class="btn btn-lg btn btn-dark btn-block"  />
          
          
        </form>
        
        <div class="form-links">
         
        </div>
      </section>  
      </div> 
      <div class="col-md-4"></div>
  </div>
</div>
</body>
</html>