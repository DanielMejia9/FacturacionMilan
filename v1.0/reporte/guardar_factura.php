<?php

require('../libreria/fpdf.php');
$numero_factura = $_POST["numero_factura"];
$rifEmp         = $_POST["rifEmp"];
$datepicker     = $_POST["datepicker"];
$dir_cliente    = $_POST["dirEmp"];
$telefono1      = $_POST["telEmpr"];
$telefono2      = $_POST["telEmpropc"];
$nom_cliente    = $_POST["nombrecliente"];


$txtCant1 = $_POST["txtCant1"];
$txtDesc1= $_POST["txtDesc1"];
$txtPrec1= $_POST["txtPrec1"];
$txtTota1= $_POST["txtTota1"];


$txtCant2 = $_POST["txtCant2"];
$txtDesc2= $_POST["txtDesc2"];
$txtPrec2= $_POST["txtPrec2"];
$txtTota2= $_POST["txtTota2"];


$txtCant3 = $_POST["txtCant3"];
$txtDesc3= $_POST["txtDesc3"];
$txtPrec3= $_POST["txtPrec3"];
$txtTota3= $_POST["txtTota3"];


$txtCant4 = $_POST["txtCant4"];
$txtDesc4= $_POST["txtDesc4"];
$txtPrec4= $_POST["txtPrec4"];
$txtTota4= $_POST["txtTota4"];


$txtCant5 = $_POST["txtCant5"];
$txtDesc5= $_POST["txtDesc5"];
$txtPrec5= $_POST["txtPrec5"];
$txtTota5= $_POST["txtTota5"];


$txtCant6 = $_POST["txtCant6"];
$txtDesc6= $_POST["txtDesc6"];
$txtPrec6= $_POST["txtPrec6"];
$txtTota6= $_POST["txtTota6"];


$txtCant7 = $_POST["txtCant7"];
$txtDesc7= $_POST["txtDesc7"];
$txtPrec7= $_POST["txtPrec7"];
$txtTota7= $_POST["txtTota7"];


$txtCant8 = $_POST["txtCant8"];
$txtDesc8= $_POST["txtDesc8"];
$txtPrec8= $_POST["txtPrec8"];
$txtTota8= $_POST["txtTota8"];


$txtCant9 = $_POST["txtCant9"];
$txtDesc9= $_POST["txtDesc9"];
$txtPrec9= $_POST["txtPrec9"];
$txtTota9= $_POST["txtTota9"];


$txtCant10 = $_POST["txtCant10"];
$txtDesc10= $_POST["txtDesc10"];
$txtPrec10= $_POST["txtPrec10"];
$txtTota10= $_POST["txtTota10"];


$subTotal = $_POST["subTotal"];
$ivaRes = $_POST["ivaRes"];
$genTotal = $_POST["genTotal"];

if($telefono2 == 'NA' || $telefono2 =='')
{
    $telefono2 == NULL;  
}

//Se declara la clases
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img_logo.png',10,8,190);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    //$this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->Cell(180,30,'' ,0,1,'C');
$pdf->Cell(180,5, "Factura:".$numero_factura ,0,1,'C');

$pdf->Cell(50,5,'C.I o R.I.F: '.$rifEmp);
$pdf->Cell(250,5,'Fecha: '.$datepicker ,0,1,'C');
$pdf->Cell(10,5,'Cliente: '.$nom_cliente);
$pdf->Cell(315,5,'Condicion de Pago: Contado ' ,0,1,'C');
$pdf->Cell(50,5,'Direccion: '.$dir_cliente ,0,1,'');
$pdf->Cell(50,5,'Telefonos: '.$telefono1 );
$pdf->Cell(50,5,''.$telefono2 ,0,1,'C');


$pdf->Cell(20,25,'Cant.' );
$pdf->Cell(120,25,'Descripcion.' );
$pdf->Cell(30,25,'Precio' );
$pdf->Cell(0,25,'Totales' ,0,1,'C');


$pdf->Cell(20,0, ' '.$txtCant1);
$pdf->Cell(120,0,' '.$txtDesc1);
$pdf->Cell(30,0,''.$txtPrec1);
$pdf->Cell(0,0,''.$txtTota1 ,0,1,'C');

$pdf->Cell(20,15, ' '.$txtCant2);
$pdf->Cell(120,15,' '.$txtDesc2);
$pdf->Cell(30,15,''.$txtPrec2);
$pdf->Cell(0,15,''.$txtTota2 ,0,1,'C');

$pdf->Cell(20,0, ' '.$txtCant3);
$pdf->Cell(120,0,' '.$txtDesc3);
$pdf->Cell(30,0,''.$txtPrec3);
$pdf->Cell(0,0,''.$txtTota3 ,0,1,'C');

$pdf->Cell(20,15, ' '.$txtCant4);
$pdf->Cell(120,15,' '.$txtDesc4);
$pdf->Cell(30,15,''.$txtPrec4);
$pdf->Cell(0,15,''.$txtTota4 ,0,1,'C');

$pdf->Cell(20,0, ' '.$txtCant5);
$pdf->Cell(120,0,' '.$txtDesc5);
$pdf->Cell(30,0,''.$txtPrec5);
$pdf->Cell(0,0,''.$txtTota5 ,0,1,'C');

$pdf->Cell(20,15, ' '.$txtCant6);
$pdf->Cell(120,15,' '.$txtDesc6);
$pdf->Cell(30,15,''.$txtPrec6);
$pdf->Cell(0,15,''.$txtTota6 ,0,1,'C');

$pdf->Cell(20,0, ' '.$txtCant7);
$pdf->Cell(120,0,' '.$txtDesc7);
$pdf->Cell(30,0,''.$txtPrec7);
$pdf->Cell(0,0,''.$txtTota7 ,0,1,'C');

$pdf->Cell(20,15, ' '.$txtCant8);
$pdf->Cell(120,15,' '.$txtDesc8);
$pdf->Cell(30,15,''.$txtPrec8);
$pdf->Cell(0,15,''.$txtTota8 ,0,1,'C');

$pdf->Cell(20,0, ' '.$txtCant9);
$pdf->Cell(120,0,' '.$txtDesc9);
$pdf->Cell(30,0,''.$txtPrec9);
$pdf->Cell(0,0,''.$txtTota9 ,0,1,'C');

$pdf->Cell(20,15, ' '.$txtCant10);
$pdf->Cell(120,15,' '.$txtDesc10);
$pdf->Cell(30,15,''.$txtPrec10);
$pdf->Cell(0,15,''.$txtTota10 ,0,1,'C');


// Posición: a 1,5 cm del final
    $pdf->SetY(230);

    // Número de página
    $pdf->Cell(330,10,'Sub-total: '.$subTotal ,0,1,'C');
	$pdf->Cell(330,10,'I.V.A. (12%): '.$ivaRes ,0,1,'C');
	$pdf->Cell(330,10,'Total General: '.$genTotal ,0,1,'C');
	
	
$pdf->Output();



$pdf->close();
?>
