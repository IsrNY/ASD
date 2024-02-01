<?php
include 'conn.php';
include 'FPDF/multicell.php';

class PDF extends FPDF_Multicell
{
    function Datos()
    {
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(10);
        $this->Cell(0, 5, "FORMATO CURRICULUM VITAE DEL INSTRUCTOR", 0, 1, 'C');
        $this->SetX(10);
        $this->Cell(0, 5, 'M00-SC-029-A01', 0, 1, 'C');
        $this->Ln(5);
        $this->SetX(10);
        $this->Write(5, '1.  DATOS PERSONALES');
        $this->Ln(5);
        $this->Write(5, 'Nombre: ');
        $this->SetFont('Arial', '', 10);
        $this->Write(5, $_POST['txNombre'] . '    ');
        $this->SetFont('Arial', 'B', 10);
        $this->Write(5, 'Fecha de Nacimiento: ');
        $this->SetFont('Arial', '', 10);
        $separados = explode('-', $_POST['txNacimiento']);
        $this->Write(5, $separados[2] . '/' . $separados[1] . '/' . $separados[0]);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->Write(5, 'CURP: ');
        $this->SetFont('Arial', '', 10);
        $this->Write(5, $_POST['txCurp']);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->Write(5, 'RFC: ');
        $this->SetFont('Arial', '', 10);
        $this->Write(5, $_POST['txRfc']);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->Write(5, 'Telefóno de contacto: ');
        $this->SetFont('Arial', '', 10);
        $this->Write(5, $_POST['txTelefono']);
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->Write(5, 'Correo electrónico: ');
        $this->SetFont('Arial', '', 10);
        $this->Write(5, $_POST['txEmail']);
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(10);
        $this->Write(5, '2.  FORMACIÓN ACADÉMICA');
        $this->Ln(5);
        $header = array('Formación Académica', 'Institución', 'Titulación', 'Cedula Prof.');
        $w = array(46, 50, 50, 35);
        $this->SetWidths($w);
        for ($i = 0; $i < 4; $i++)
            $this->Cell($w[$i], 5, $header[$i], 'TB', 0, 'C');
        $this->Ln(5);
        $FA = array('Licenciatura', 'Maestría', 'Doctorado', 'Especialidad', 'Otros estudios');
        $x = array('txLicenciatura', 'txMaestria', 'txDoctorado', 'txEspecialidad', 'txOtros');
        $fill = false;
        $this->SetFillColor(208,206,206);
        $this->SetLineHeight(5);
        for ($i = 0; $i < 5; $i++) {
            $this->Row(array($FA[$i], $_POST[$x[$i] . 'I'], $_POST[$x[$i] . 'T'], $_POST[$x[$i] . 'CP']), 'C', false, $fill, true);
            $fill = !$fill;
        }
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(10);
        $this->Write(5, '3.  EXPERIENCIA LABORAL');
        $this->Ln(5);
        $header = array('No.', 'Puesto', 'Empresa', 'Permanencia', 'Actividades');
        $w = array(10, 38, 44.3, 44.3, 44.3);
        $this->SetWidths($w);
        $fill = false;
        for ($i = 0; $i < 5; $i++)
            $this->Cell($w[$i], 5, $header[$i], 'TB', 0, 'C');
        $this->Ln(5);
        for ($i = 1; $i <= 3; $i++) {
            $this->Row(array($i, $_POST['txPuesto' . $i], $_POST['txEmpresa' . $i], $_POST['txPermanencia' . $i], $_POST['txActividades' . $i]), 'C', false, $fill, true);
            $fill = !$fill;
        }
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(10);
        $this->Write(5, '4.  EXPERIENCIA DOCENTE');
        $this->Ln(5);
        $header = array('No.', 'Materia', 'Periodo');
        $w = array(10, 85.5, 85.5);
        $this->SetWidths($w);
        $fill = false;
        for ($i = 0; $i < 3; $i++)
            $this->Cell($w[$i], 5, $header[$i], 'TB', 0, 'C');
        $this->Ln(5);
        for ($i = 1; $i <= 3; $i++) {
            $this->Row(array($i, $_POST['txMateria' . $i], $_POST['txPeriodo' . $i]), 'C', false, $fill, true);
            $fill = !$fill;
        }
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(10);
        $this->Write(5, '5.  PRODUCTOS ACADÉMICOS');
        $this->Ln(5);
        $header = array('No.', 'Actividad/Producto', 'Descripción', 'Fecha');
        $w = array(10, 73, 73, 25);
        $this->SetWidths($w);
        $fill = false;
        for ($i = 0; $i < 4; $i++)
            $this->cell($w[$i], 5, $header[$i], 'TB', 0, 'C');
        $this->Ln(5);
        for ($i = 1; $i <= 3; $i++) {
            $this->Row(array($i, $_POST['txActividad' . $i], $_POST['txDescripcion' . $i], $_POST['txFecha' . $i]), 'C', false, $fill, true);
            $fill = !$fill;
        }
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 10);
        $this->SetX(10);
        $this->Write(5, '6.  PARTICIPACIÓN COMO INSTRUCTOR');
        $this->Ln(5);
        $header = array('No.', 'TÍTULO', 'Institución, Empresa u Organizacion', 'Duracion', 'Fecha');
        $w = array(10, 55.5, 65.5, 25, 25);
        $this->SetWidths($w);
        $fill = false;
        for ($i = 0; $i < 5 ; $i++)
            $this->Cell($w[$i], 5, $header[$i], 'TB', 0, 'C');
        $this->Ln(5);
        for ($i = 1; $i <= 3; $i++) {
            $this->Row(array($i, $_POST['txTitulo' . $i], $_POST['txIEO' . $i], $_POST['txDuracion' . $i]. " horas", $_POST['txFe' . $i]), 'C', false, $fill, true);
            $fill = !$fill;
        }
        $this->Ln(5);
    }
}

$pdf = new PDF();
$pdf->SetTitle('CVU ' . $_POST['txRfc'], true);
$pdf->SetAutoPageBreak(true);
$pdf->SetLeftMargin(16);
$pdf->AddPage();
$pdf->Datos();
$pdf->Output('F', './Archivos/CVU/CVU ' . $_POST['txRfc'] . '.pdf', true);
#$pdf->Output('I', 'CVU ' . $_POST['txRfc'] . '.pdf', true);
$rfc = $_POST['txRfc'];
$sql = "UPDATE usuarios SET CVU = 'Si' WHERE RFC = '$rfc'";
$query = mysqli_query($conn, $sql);
header('location:instructor.php?clave=' . $_POST['clave']);
?>