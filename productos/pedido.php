<?php

include("../class/class.php");
require('../libreria/fpdf.php');

$con = new Conectar();
$conectar = $con->conecta();




    $sql ="select * FROM tb_productos as A inner join tb_categorias_productos as B on A.id_categoria = B.id_categoria where A.cantidad_producto <= A.minimo_stock group by A.descripcion_producto order by categoria
";



$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../images/black-logo.png', 10 ,8, 70 , 15,'PNG');
$pdf->Cell(1, 10, '', 0);
$pdf->Ln(20);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(60, 8, '', 0);
$pdf->Cell(60, 8, 'Autogenerador de Pedido Mercancia', 0);
$pdf->Ln(10);
$pdf->Cell(105, 8, '', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 9);
//$pdf->Cell(15, 8, 'Item', 0);
$pdf->Cell(60, 8, 'Descripcion del Producto', 0);
$pdf->Cell(35, 8, 'Categoria', 0);
$pdf->Cell(25, 8, 'Cant.', 0);
$pdf->Cell(50, 8, 'Minimo Stock', 0);
$pdf->Cell(40, 8, 'Costo', 0);


$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query($sql);
//$item = 0;

$total = 0;

while($productos2 = mysql_fetch_array($productos)){

	
$total = $total + $productos2['costo_producto'];
	
  
	$pdf->Ln(5);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(60, 5,$productos2['descripcion_producto'], 0);
	$pdf->Cell(38, 5, $productos2['categoria'], 0);
	$pdf->Cell(30, 5, $productos2['cantidad_producto'], 0);
	$pdf->Cell(45, 5, $productos2['minimo_stock'], 0);
	$pdf->Cell(30, 5, $productos2['costo_producto'], 0);

	}

$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(147,8,'');
$pdf->Cell(220,8,'Total: '. number_format($total,2,',','.'),0);


$pdf->Output();


?>