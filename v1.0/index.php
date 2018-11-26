<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/style.css"/>
<link rel="shortcut icon" href="favicon.ico">
<script  type="application/javascript" src="jscript/funciones.js"></script>
<title>Sistema Administrativo</title>
</head>

<body>        
    <div id="absolute">
     <div id="logo">
      	<img src="images/Jirehpro_logo.png" width="245" style="float: left;" />       
	</div>
    <center>
    	<div id="cuerpo_home">
              <form action="validar.php" name="form_ing" method="post">
               
               <table  width="700" border="0" align="right">
               		<tr>
                    	<td colspan="2"><h1>Acceso al Sistema Administrativo</h1></td>
                    </tr>
                    <tr>
                    	<td>
                        	<div class="txt">
                        	Usar un nombre de usuario y <br />
                            contraseña válido para poder tener <br />
                             acceso al sistema.<br />
                             <a href="http://jirehpro.com/" target="_blank" style="color:#025A8D;font-weight:bold;"">Soluciones de soporte tecnico	</a>
                            </div>
                        <td>
                         <table  width="379" border="0" align="right" class="cajaUser">
                            <tr>
                                <td width="170" align="right">Usuario: </td>
                                <td width="197"  align="left"><input type="text" name="usuario" id="usuario" size="25" maxlength="30"/></td>
                            </tr>
                            <tr>
                                <td  align="right">Contrase&ntildea: </td>
                                <td  align="left"><input type="password"  name="password" id="password" size="26" maxlength="30"/></td>
                            </tr>	
                                <tr align="right">
                                    <td colspan="2">
                                    	<button type="submit" onclick="validarUser();" class="btn">Ingresar</button>
                                    </td>
                            </tr>
                            </table>
                            </td>
                            </table>
                </form>
                
          </div>
       </center>
    </div>

    
</body>
</html>