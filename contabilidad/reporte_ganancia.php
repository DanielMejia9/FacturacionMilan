<?php

include("../class/class.php");
require('../libreria/fpdf.php');

$con = new Conectar();
$conectar = $con->conecta();

$desde = date('Y-m-d', strtotime($_GET["desde"]));
$hasta = date('Y-m-d', strtotime($_GET["hasta"]));


if($desde !='' && $hasta !='')
{
    $sql ="select A.descripcion_producto,D.categoria, A.costo_producto, B.precio , C.fech_emis from tb_productos AS A 
inner join tb_detalle_factura AS B on A.id_producto = B.id_producto 
inner join tb_factura as C on B.codi_factu = C.codi_factu
inner join tb_categorias_productos as D on D.id_categoria = A.id_categoria where fech_emis between '$desde' and '$hasta'";

	$sql2 ="select * from tb_gastos where fech_emis between '$desde' and '$hasta'";
}


$mdesde = date('d-m-Y', strtotime($desde));
$mhasta = date('d-m-Y', strtotime($hasta));

$pdf = new FPDF('L','mm','A4');

$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/black-logo.png' , 10 ,8, 60 , 15,'PNG');
$pdf->Cell(1, 10, '', 0);
$pdf->Cell(240, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(25);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(112, 8, '', 0);
$pdf->Cell(150, 8, 'Estado de Ganancia y Perdida', 0);
$pdf->Ln(10);
$pdf->Cell(105, 8, '', 0);
$pdf->Cell(150, 8, 'Desde: '.$mdesde.' hasta: '.$mhasta, 0);
$pdf->Ln(25);
$pdf->SetFont('Arial', 'B', 9);
//$pdf->Cell(15, 8, 'Item', 0);
/*$pdf->Cell(30, 8, 'Fecha', 0);
$pdf->Cell(90, 8, 'Descripcion del Producto', 0);
$pdf->Cell(30, 8, 'Costo', 0);
$pdf->Cell(25, 8, 'Precio', 0);
$pdf->Cell(35, 8, '(Costo - Precio)', 0);
$pdf->Cell(30, 8, 'Impuesto', 0);

$pdf->Cell(40, 8, 'Ganancia', 0);

$pdf->Ln(8);*/
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query($sql);
//$item = 0;

$monto_i  = 0;
$monto_g  = 0;
$venta    = 0;
$costo    = 0;
$gastos   = 0;

while($productos2 = mysql_fetch_array($productos)){
	//$item = $item+1;
	
	
	


	$venta 	  =  $venta + $productos2['precio'];
	$costo    =  $costo + $productos2['costo_producto'];
	$ganancia =  $venta - $costo;
	$impuesto =  $ganancia * 0.1;

}


$consulta = mysql_query($sql2);
while($resultado = mysql_fetch_array($consulta))
{

	$gastos    =  $gastos + $resultado['monto_total'];
	}
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(250,8,'Ventas Netas');
$pdf->Cell(30,8, number_format($venta,2,',','.'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(252,8,'Costo de la Venta');
$pdf->Cell(30,8, number_format($costo,2,',','.'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'BIU', 11);
$pdf->Cell(250,8,'Utilidad Bruto en Ventas');
$pdf->Cell(30,8, number_format($venta - $costo,2,',','.'),0);
$pdf->Ln(8);


$pdf->SetFont('Arial', '', 11);
$pdf->Cell(200,8,'Gastos Administrativos');
$pdf->Cell(30,8, number_format($gastos ,2,',','.'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'BIU', 11);
$pdf->Cell(200,8,'Total Gastos');
$pdf->Cell(30,8, number_format($gastos,2,',','.'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'BIU', 11);
$pdf->Cell(250,8,'Total Utilidad en Operaciones');
$pdf->Cell(30,8, number_format($ganancia-$gastos,2,',','.'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(250,8,'Monto Impuesto');
$pdf->Cell(30,8, number_format($impuesto ,2,',','.'),0);
$pdf->Ln(8);
$pdf->SetFont('Arial', 'BIU', 11);
$pdf->Cell(250,8,'Total Utilidad Neta','U');
$pdf->Cell(30,8, number_format( $ganancia - $impuesto - $gastos,2,',','.'),0);
$pdf->Ln(8);



$pdf->Output();


?>