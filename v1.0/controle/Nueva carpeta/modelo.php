<?php
require("conexion.php");
//$registrar = $_POST["username"];


//Rescata valores del registro de cliente
	$nomcliente = $_POST["nom_cliente"];
	$rif = trim($_POST["rifEmp"]);
	$nit = $_POST["nitEmp"];
	$fecha = $_POST["datepicker"];
	$direccion = $_POST["dirEmp"];
	$pais = $_POST["paisEmp"];
	$ciudad = $_POST["ciuEmp"];
	$estado = $_POST["estEmp"];
	$telefono = $_POST["telEmpr"];
	$telefono_opc = $_POST["telEmpropc"];
	$contribuyente = $_POST["contEmp"];
	$nomcont = $_POST["nomCont"];
	$apellidocont = $_POST["apeCont"];
	$cargo = $_POST["carCont"];
	$telcont = $_POST["telCont"];
	$correo = $_POST["correo"];


$result= mysql_query('SELECT rif_clie FROM tb_regi_cli');
if($row = mysql_fetch_array($result)){
	if(!($row['rif_clie'] == $rif))
	{
		//Almacena en la base de datos los datos del cliente
		mysql_query
		('INSERT INTO tb_regi_cli (nomb_clie, rif_clie, nit_clie, fech_clie, dire_clie, pais_clie, ciud_clie, esta_clie, tele_clie, tele_clie_opci, cont_espe_clie)
		VALUES
		(\''.$nomcliente.'\',\''.$rif.'\',\''.$nit.'\',\''.$fecha.'\',\''.$direccion.'\',\''.$pais.'\',\''.$ciudad.'\',\''.$estado.'\',\''.$telefono.'\',\''.$telefono_opc.'\',\''.$contribuyente.'\')')or die(mysql_error());
		
		
		
		//Almacena en la base de datos los datos del cliente
		mysql_query
		('INSERT INTO tb_regi_pers_cont (nomb_cont, apel_cont, cargo_cont, tele_cont, corr_cont)
		VALUES
		(\''.$nomcont.'\',\''.$apellidocont.'\',\''.$cargo.'\',\''.$telcont.'\',\''.$correo.'\')')or die(mysql_error());

		?>	
		<script language="javascript">
			alert("Cliente registrado sastifactoriamente");
			location.href = "http://localhost/admin/registro_cliente.php";
		</script>
		<?php		
		
		
	}
	else
	{
		?>
		<script language="javascript">
		alert("Este cliente ya ha sido registrado");
		location.href = "http://localhost/admin/registro_cliente.php";
		</script>
		<?php	
	}
}











?>
					
                    
                        