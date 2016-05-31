<?php

include('pg/classes/CistellaClass.php');
include('pg/classes/GeneralBD.php');
include('lib/fpdf/fpdf.php');

$cistella = new CistellaClass();
$GeneralBD = new GeneralBD();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img/logo/theworldcycle.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Factura de la compra');
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
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

//Taula
function BasicTable($coluhead, $colubody,$total)
{
    // Capçalera
    foreach($coluhead as $col)
        $this->Cell(50,7,$col,1);
    $this->Ln();
    // Dades
    foreach($colubody as $row)
    {
        foreach($row as $col)
            $this->Cell(50,6,$col,1);
        $this->Ln();
    }

	$this->Ln();
	$this->Cell(50,6,"",0);
	$this->Cell(50,6,"Total",1);
	$this->Cell(50,6,$total[0],1);
	$this->Cell(50,6,$total[1]." Euros",1);
	$this->Ln();
}
}

//Columnes de la taula per mostrar els productes
$prototal = $cistella->productes_total();
$pretotal = $cistella->preu_total();
$colubody = $cistella->get_content();
$coluhead = array('Id','Producte','Quantitat','Preu');
$total = array($prototal,$pretotal);

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->BasicTable($coluhead, $colubody,$total);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'Usuari que ha realitzat aquesta compra es '. $_SESSION['nom'] .' '. $_SESSION['cognoms'] .' ('. $_SESSION['correu'].')',0,1);
$pdf->Cell(0,10,'Moltes gracies per la teva compra i esperem que vagis utilitzant aquesta web!',0,1);
$pdf->Cell(0,10,'Ubicacio d\' enviament es:',0,1);
$pdf->Cell(0,5,$_SESSION['adrenviar1'],0,1);
$pdf->Cell(0,5,$_SESSION['adrenviar2'],0,1);

$data_avui = date("Y-n-j hh");
$pdf->Output($_SESSION['nom'].''.$data_avui.'factura.pdf','D');
$cistella->destroy();
?>
