<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('logo2.PNG',10,8,50);
    $this->SetFont('Courier','B',10);
    $this->Cell(121);
    $this->Cell(100,5, 'Empresa de Industrias Graficas',0,0,'');
    $this->SetTextColor(43, 139, 255);
    $this->Ln(3);
    $this->Cell(130);
    $this->SetFont('Courier','BU',10);
    $this->Cell(0,5, 'Colorlineprint@gmail.com',0,0,'C');

    
    $this->SetFillColor(230, 230, 250); 
    $this->SetDrawColor(61,174,233);
    $this->SetLineWidth(2);
    $this->Line(10,28,30,28);
    $this->SetDrawColor(255, 51, 236);
    $this->SetLineWidth(2);
    $this->Line(31,28,50,28);
    $this->SetDrawColor(50,15,263);
    $this->SetLineWidth(2);
    $this->Line(51,28,70,28);
    $this->SetDrawColor(63, 255, 51);
    $this->SetLineWidth(2);
    $this->Line(71,28,90,28);
    $this->SetDrawColor(245, 17, 17);
    $this->SetLineWidth(2);
    $this->Line(91,28,110,28);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(2);
    $this->Line(111,28,130,28);
    $this->SetDrawColor(245, 190, 17);
    $this->SetLineWidth(2);
    $this->Line(131,28,150,28);
    $this->SetDrawColor(255, 231, 54  );
    $this->SetLineWidth(2);
    $this->Line(151,28,200,28);



   

    $this->Ln(25);

    
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(40,10,date('d/m/Y'),0,0,'L');
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');

    
}
}


require '../../api/core/helpers/Connection.php';
$consulta ="SELECT cliente.cliente, cliente.numero_registro, cliente.telefono, cliente.correo, cliente.fechacreacion
FROM cliente
ORDER BY cliente.fechacreacion DESC";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Courier','B',10);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(0,5, 'Clientes',0,0,'C');
$pdf->Cell(80);
$pdf->Ln(10);
$pdf->SetFillColor(255, 255, 255);

$pdf-> cell(45,10, 'Empresa', 0,0, 'B', 1);
$pdf-> cell(45,10, 'Numero registro', 0,0, 'B', 1);
$pdf-> cell(25,10, 'telefono', 0,0, 'c', 1);
$pdf-> cell(45,10, 'Correo', 0,0, 'c', 1);
$pdf-> cell(40 ,10, 'Fecha', 0,1, 'c', 1);
$pdf->SetDrawColor(50,15,263);
$pdf->SetLineWidth(0.5);
$pdf->Line(10,57,200,57);

while($row = $resultado->fetch_assoc()){
    $pdf-> cell(45,10, $row['cliente'], 0,0, 'c', 0);
    $pdf-> cell(45,10, $row['numero_registro'], 0,0, 'c', 0);
    $pdf-> cell(25,10, $row['telefono'], 0,0, 'c', 0);
    $pdf-> cell(45,10, $row['correo'], 0,0, 'c', 0);
    $pdf-> cell(40,10, $row['fechacreacion'], 0,1, 'c', 0);
}


$pdf->Output();
?>
