<?php

include("../class/class.php");
require('../libreria/fpdf.php');

$con = new Conectar();
$conectar = $con->conecta();

$desde = date('Y-m-d', strtotime($_GET["desde"]));
$hasta = date('Y-m-d', strtotime($_GET["hasta"]));

if($desde !='' && $hasta !='')
{
    $sql ="select * from tb_gastos as A inner join tb_detalle_gastos as B on A.codi_gastos = B.codi_gastos where fech_emis between'$desde' and '$hasta'";
}



$mdesde = date('d-m-Y', strtotime($desde));
$mhasta = date('d-m-Y', strtotime($hasta));

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
//$pdf->Image('../images/Jirehpro_logo.png' , 10 ,8, 50 , 25,'PNG');
$pdf->Cell(1, 10, '', 0);
$pdf->Cell(240, 10, 'Razon Social:Tecnologia Desarrollo Jirehpro,C.A.', 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(110, 8, '', 0);
$pdf->Cell(90, 8, 'Reporte Detallado de Gastos', 0);
$pdf->Ln(10);
$pdf->Cell(104, 8, '', 0);
$pdf->Cell(140, 8, 'Desde: '.$mdesde.' hasta: '.$mhasta, 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 11);
//$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(20, 8, 'Fecha', 0);
$pdf->Cell(70, 8, 'Descripcion', 0);
$pdf->Cell(70, 8, 'Cantidad', 0);
$pdf->Cell(47, 8, 'Monto Neto', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 9);
//CONSULTA
$productos = mysql_query($sql);
//$item = 0;
$monto_n  = 0;
$monto_i  = 0;
$monto_t  = 0;
while($productos2 = mysql_fetch_array($productos)){
	//$item = $item+1;
	$monto_n  = $monto_n + $productos2['precio'];

    
	//$pdf->Cell(15, 8, $item, 0);
    $pdf->Cell(20, 5, date('d-m-Y', strtotime($productos2['fech_emis'])), 0);
	$pdf->Cell(73, 5,$productos2['descripcion'], 0);
	$pdf->Cell(75, 5, $productos2['cantidad'], 0);
	$pdf->Cell(43, 5, number_format($productos2['precio'],2,',','.'), 0);
	$pdf->Ln(5);

}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(220,8,'',0);
$pdf->Cell(100,8,'Monto Neto. '.number_format($monto_n,2,',','.'),0);

$pdf->Output();

//$pdf->Output('reporte.pdf','D');
?>