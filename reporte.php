<?php
session_start();
require('reportes/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	$this->Image('assets\img\Logo.jpg',15,15,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Ln(20);
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de asistencias',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Ln(20);    $this->Cell(70, 10, 'Asignatura', 1, 0, 'C', 0);
	$this->Cell(60, 10, 'Fecha', 1, 0, 'C', 0);
	$this->Cell(50, 10, 'Detalles', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-19);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página  ').$this->PageNo().'/{nb}',0,0,'C');
}
}
include('config/index.php');
$stmt= $connection->prepare('SELECT m.nombre, a.detalles, a.fecha_asistencia FROM asistencia AS a INNER JOIN materia AS m ON (a.id_materia=m.id) where id_estudiante='.$_SESSION['id']);
$stmt->execute();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);

while($row = $stmt->fetch()){
	$pdf->Cell(70, 10, utf8_decode($row['nombre']), 1, 0, 'C', 0);
	$pdf->Cell(60, 10, $row['fecha_asistencia'], 1, 0, 'C', 0);
	$pdf->Cell(50, 10, utf8_decode($row['detalles']), 1, 1, 'C', 0);
}



$pdf->Output();
?>