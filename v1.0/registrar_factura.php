<?php
require_once("class/class.php");
	print_r($_POST);
$Facturacion = new Facturacion();



$cantidad1	 = $_POST["txtCant1"];
$descripcion1 = $_POST["txtDesc1"];
$precio1		 = $_POST["txtPrec1"];

$cantidad2	 = $_POST["txtCant2"];
$descripcion2 = $_POST["txtDesc2"];
$precio2	 = $_POST["txtPrec2"];

$cantidad3	 = $_POST["txtCant3"];
$descripcion3 = $_POST["txtDesc3"];
$precio3	 = $_POST["txtPrec3"];

$cantidad4	 = $_POST["txtCant4"];
$descripcion4 = $_POST["txtDesc4"];
$precio4	 = $_POST["txtPrec4"];

$cantidad5	 = $_POST["txtCant5"];
$descripcion5 = $_POST["txtDesc5"];
$precio5	 = $_POST["txtPrec5"];

$cantidad6	 = $_POST["txtCant6"];
$descripcion6 = $_POST["txtDesc6"];
$precio6	 = $_POST["txtPrec6"];

$cantidad7	 = $_POST["txtCant7"];
$descripcion7 = $_POST["txtDesc7"];
$precio7	 = $_POST["txtPrec7"];

$cantidad8	 = $_POST["txtCant8"];
$descripcion8 = $_POST["txtDesc8"];
$precio8	 = $_POST["txtPrec8"];

$cantidad9	 = $_POST["txtCant9"];
$descripcion9 = $_POST["txtDesc9"];
$precio9	 = $_POST["txtPrec9"];

$cantidad10	 = $_POST["txtCant10"];
$descripcion10 = $_POST["txtDesc10"];
$precio10	 = $_POST["txtPrec10"];




$numero_factura	 = $_POST["numero_factura"];
$numero_control  = $_POST["numero_control"];
$datepicker      = $_POST["datepicker"];
$codi_clie       = $_POST["codigo-cliente"];
$monto_neto = 100;
$monto_iva = 12;
$monto_total = 112;
$status_factura = 1;

//$ValidaCodiFact = $Facturacion->validarNumeroFactura($numero_factura);

//$regFactura = $Facturacion->registraFactura($numero_factura,$numero_control,$datepicker,$codi_clie,$monto_neto,$monto_iva,$monto_total,$status_factura,$cantidad1,$descripcion1,$precio1);





?>