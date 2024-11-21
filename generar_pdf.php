<?php
require('fpdf.php');

$id = $_GET['id'];

// Conectar a la base de datos
$conn = new mysqli("localhost", "usuario", "contraseña", "revisiones_camionetas");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el reporte
$sql = "SELECT * FROM reportes WHERE id = $id";
$result = $conn->query($sql);
$reporte = $result->fetch_assoc();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(40, 10, 'Reporte de Revisión de Camioneta');
$pdf->Ln();
$pdf->Cell(40, 10, 'Equipo: ' . $reporte['equipo']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Fecha: ' . $reporte['fecha_reporte']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Nombre: ' . $reporte['nombre']);
$pdf->Ln();
$pdf->Cell(40, 10, 'Comentarios: ' . $reporte['comentarios']);
$pdf->Ln();

$pdf->Output();
?>
