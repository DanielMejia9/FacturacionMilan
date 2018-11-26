<?php

include("../class/class.php");
require('../libreria/fpdf.php');

$con = new Conectar();
$conectar = $con->conecta();

$desde = date('Y-m-d', strtotime($_GET["desde"]));
$hasta = date('Y-m-d', strtotime($_GET["hasta"]));


if($desde !='' && $hasta !='')
{
    $sql ="select C.codi_factu, B.descripcion,B.cantidad,D.categoria, A.costo_producto, B.precio , C.fech_emis from tb_productos AS A inner join tb_detalle_factura AS B on A.id_producto = B.id_producto inner join tb_factura as C on B.codi_factu = C.codi_factu inner join tb_categorias_productos as D on D.id_categoria = A.id_categoria where fech_emis between  '$desde' and '$hasta'";

	$sql2 ="select * from tb_gastos ";
}


$mdesde = date('d-m-Y', strtotime($desde));
$mhasta = date('d-m-Y', strtotime($hasta));

$pdf = new FPDF('L','mm','Legal');

$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/black-logo.png' , 10 ,8, 60 , 15,'PNG');
$pdf->Cell(1, 10, '', 0);
$pdf->Cell(240, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(112, 8, '', 0);
$pdf->Cell(150, 8, 'Estado de Ganancia y Perdida', 0);
$pdf->Ln(10);
$pdf->Cell(105, 8, '', 0);
$pdf->Cell(150, 8, 'Desde: '.$mdesde.' hasta: '.$mhasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 9);
//$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(30, 8, 'Fecha', 0);
$pdf->Cell(90, 8, 'Descripcion del Producto', 0);
$pdf->Cell(35, 8, 'N. factura', 0);
$pdf->Cell(35, 8, 'Costo', 0);
$pdf->Cell(30, 8, 'Precio', 0);
$pdf->Cell(40, 8, '(Costo - Precio)', 0);
$pdf->Cell(35, 8, 'Impuesto', 0);

$pdf->Cell(40, 8, 'Ganancia', 0);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query($sql);
//$item = 0;

$monto_i  = 0;
$monto_g  = 0;
$totalventa = 0;
$tcosto = 0;
while($productos2 = mysql_fetch_array($productos)){
	//$item = $item+1;
	
	$precio   = $productos2['precio'] * $productos2['cantidad'];
	$costo    = $productos2['costo_producto'];
	$pc       = $precio - $costo;
	$pci      = $pc * 0.1;
	$ganancia = $pc - $pci;
    $monto_g  = $monto_g + $ganancia;
	$monto_i  = $monto_i + $pci;
	$tcosto   = $tcosto + $productos2['costo_producto'];

	$totalventa = $totalventa + $precio;
	
    $pdf->Cell(30, 5, date('d-m-Y', strtotime($productos2['fech_emis'])), 0);
	$pdf->Cell(90, 5,$productos2['descripcion'].' / '.$productos2['categoria'], 0);
	$pdf->Cell(35, 5, $productos2['codi_factu'],0);
	$pdf->Cell(35, 5, number_format($costo,2,',','.'),0);
	$pdf->Cell(35, 5, number_format($precio,2,',','.'),0);
	$pdf->Cell(35, 5, number_format($pc ,2,',','.') ,0);
	$pdf->Cell(35, 5, number_format($pci,2,',','.'),0);
	
	$pdf->Cell(40, 5, number_format($ganancia,2,',','.'),0);
	$pdf->Ln(8);
	/*$pdf->Cell(30, 5, '', 0);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(70, 5,$productos2['descripcion_producto'], 0);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Ln(8);*/

}
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(100,8,'Total Ventas: '. number_format($totalventa,2,',','.'),0);
$pdf->Cell(100,8,'Monto Impuesto: '. number_format($monto_i,2,',','.'),0);
$pdf->Cell(82,8,'Total Ganancia. '.number_format($monto_g,2,',','.'),0);
$pdf->Cell(82,8,'Costo. '.number_format($tcosto,2,',','.'),0);

$pdf->Output();


?>