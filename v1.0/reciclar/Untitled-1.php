<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>

<form name="form_clie" id="form_clie" action="registro_cliente.php" method="post">
                    <table border="0" width="900" height="300" align="center" id="RegClien" class="regUser">
                        <tr>
                            <td>
                                <h2>Datos de la Empresa</h2><hr />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombre del Cliente: <input type="text" name="nom_cliente" id="nom_cliente" maxlength="250" size="30" />
                                Rif: <input type="text" name="rifEmp" id="rifEmp" maxlength="12" size="15" />
                                NIT: <input type="text" name="nitEmp" id="nitEmp" maxlength="15" size="15" />
                                Fecha: <input type="text" name="datepicker" id="datepicker" maxlength="10" size="6" class="demo"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Dirección: <input type="text" name="dirEmp" id="dirEmp" maxlength="200" size="50" />
                                Pais: <input type="text" name="paisEmp" id="paisEmp" maxlength="12" size="20" />
                                Ciudad: <input type="text" name="ciuEmp" id="ciuEmp" maxlength="50" size="20" />
                            </td>
                       </tr>
                       <tr>
                            <td>
                                Estado: <input type="text" name="estEmp" id="estEmp" maxlength="12" size="20" />
                                Telefonos*: <input type="text" name="telEmpr" id="telEmpr" maxlength="11" size="20" />
                                 Telefonos(opcional): <input type="text" name="telEmpropc" id="telEmpropc" maxlength="11" size="20" />
                                Contr: 
                               <!--<input type="text" name="contribuyente" maxlength="2" size="2" />-->
                               <select name="contEmp" id="contEmp">
                                <option></option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                               </select>
                              
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <br /><br />
                                <h2>Datos persona contacto</h1><hr />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nombres: <input type="text" name="nomCont" maxlength="25" size="30" />
                                Apellidos: <input type="text" name="apeCont" maxlength="25" size="30" />
                                Cargo: <input type="text" name="carCont" maxlength="15" size="25" />
                               
                            </td>
                        </tr>
                        <tr>    
                            <td>
                                Telefonos: <input type="text" name="telCont" maxlength="11" size="25" />
                                Correo: <input type="text" name="correo" maxlength="25" size="25" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td style=" text-align:center">
                                <input type="button" id="btn" name="username" value="Registrar"  onclick="validaReg();"/>
                                <input type="reset" id="btn" value="Limpiar" />
                                 <input type="button" id="btn" name="verUser" value="Ver/Oculta Lista"  Onclick="verUsuer();"/>
                                <input  type="hidden" name="mostrUser" id="mostrUser"  />
                            </td>

                        </tr>
                    </table>
                    
                    <!-- Rescata el valor del Codigo ID del usuario-->
                    <input type="hidden" name="cod_uniClie" id="cod_uniClie" />   
                    </form>
</body>
</html>