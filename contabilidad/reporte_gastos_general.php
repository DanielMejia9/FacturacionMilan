<?php

include("../class/class.php");
require('../libreria/fpdf.php');

$con = new Conectar();
$conectar = $con->conecta();

$desde = date('Y-m-d', strtotime($_GET["desde"]));
$hasta = date('Y-m-d', strtotime($_GET["hasta"]));

if($desde !='' && $hasta !='')
{
    $sql ="select sum(monto_neto) as monto_neto, sum(monto_iva) as monto_iva, sum(monto_total) as monto_total  from tb_gastos  where fech_emis between '$desde' and '$hasta'";
}

/*if($desde !='' && $hasta !='' && $cliente !='')
{
    $sql ="select sum(A.monto_total) as monto_total from tb_factura as A inner join tb_regi_cli as B on A.codi_clie = B.codi_clie  where fech_emis between '$desde' and '$hasta' and B.codi_clie='$cliente'";
}*/


$mdesde = date('d-m-Y', strtotime($desde));
$mhasta = date('d-m-Y', strtotime($hasta));

$pdf = new FPDF('L','mm','A4');

$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//$pdf->Image('../images/Jirehpro_logo.png' , 10 ,8, 50 , 25,'PNG');
$pdf->Cell(1, 10, '', 0);
$pdf->Cell(240, 10, 'Milanbc.com.', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(112, 8, '', 0);
$pdf->Cell(140, 8, 'Reporte General de Gastos', 0);
$pdf->Ln(10);
$pdf->Cell(105, 8, '', 0);
$pdf->Cell(150, 8, 'Desde: '.$mdesde.' hasta: '.$mhasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
//$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(20, 8, 'Fecha', 0);
$pdf->Cell(137, 8, 'Nombre', 0);
$pdf->Cell(42, 8, 'Monto Neto', 0);
$pdf->Cell(55, 8, 'Monto I.V.A', 0);
$pdf->Cell(25, 8, 'Monto Total', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query($sql);
//$item = 0;
$monto_n  = 0;
$monto_i  = 0;
$monto_t  = 0;
while($productos2 = mysql_fetch_array($productos)){
	//$item = $item+1;
	$monto_n  = $monto_n + $productos2['monto_neto'];
	$monto_i   = $monto_i  + $productos2['monto_iva'];
    $monto_t = $monto_t + $productos2['monto_total'];


    $pdf->Cell(20, 8, date('d-m-Y', strtotime($mdesde)), 0);
	$pdf->Cell(140, 8, 'Gastos General', 0);
	$pdf->Cell(44, 8, number_format($productos2['monto_neto'],2,',','.'), 0);
	$pdf->Cell(55, 8, number_format($productos2['monto_iva'],2,',','.'), 0);
    $pdf->Cell(25, 8, number_format($productos2['monto_total'],2,',','.'), 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(152,8,'',0);
$pdf->Cell(45,8,'Monto Neto. '.number_format($monto_n,2,',','.'),0);
$pdf->Cell(45,8,'Monto I.V.A.'. number_format($monto_i,2,',','.'),0);
$pdf->Cell(45,8,'Monto Total. '.number_format($monto_t,2,',','.'),0);

$pdf->Output();

//$pdf->Output('reporte.pdf','D');
?>
