<?php
require_once("../class/class.php");
require('../libreria/fpdf.php');
	//print_r($_POST);
$Facturacion = new Facturacion();

$conexion = new Conectar();
$conectar = $conexion->conecta();




    
if(isset($_POST["registrarGast"]) && $_POST["registrarGast"] =='1')
{
for($i=1; $i<10; $i++)
{
     $descripcion = $_POST['txtDesc'.$i];
     $cantidad    = $_POST['txtCant'.$i];
     $precio      = $_POST['txtPrec'.$i];
     $numero_factura	 = $_POST["numero_factura"];
     
     //echo $descripcion.$cantidad.$precio."<br>";  

     if($cantidad!=''&& $descripcion!='') 
     {
        mysql_query("insert into tb_detalle_gastos (codi_gastos,cantidad,descripcion, precio)values('$numero_factura','$cantidad','$descripcion','$precio')");
     }
    
  }


$datepicker      = date('Y-m-d', strtotime($_POST["datepicker"]));
$monto_neto = str_replace('.', '', $_POST["subTotal"]);
$monto_iva = str_replace('.', '', $_POST["ivaRes"]);
$monto_total = str_replace('.', '', $_POST["genTotal"]);


$monto_neto = str_replace(',', '.', $monto_neto);
$monto_iva = str_replace(',', '.', $monto_iva);
$monto_total = str_replace(',', '.', $monto_total);



$regGastos = $Facturacion->registraGastos($datepicker,$monto_neto,$monto_iva,$monto_total);
    
echo "<script type='text/javascript'>
			alert('El registro satisfactorio');
			window.location='gastos.php';
			</script>";
}


?>