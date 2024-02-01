<?php
include 'conn.php';
include 'FPDF/multicell.php';
$sql = "SELECT Nombre, Apellidos, Funcion FROM usuarios WHERE Usuario = 'da' OR Usuario = 'sa' ORDER BY Usuario ASC";
$query = mysqli_query($conn,$sql);
$nombreC = array();
while ($row = mysqli_fetch_array($query))
{
    array_push($nombreC, $row['Nombre'] . ' ' . $row['Apellidos']);
}
class PDF extends FPDF_Multicell
{
    function Datos($conn, $nombreC)
    {
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(0, 5, 'PROGRAMA INSTITUCIONAL DE ACTUALIZACIÓN PROFESIONAL Y FORMACIÓN DOCENTE', 0, 1, 'C');
        $this->Cell(0, 5, 'M00-5C-EC-029-A03', 0, 1, 'C');
        $this->Cell(0, 5, 'PERÍODO INTERSEMESTRAL JUNIO-AGOSTO 2019', 0, 0, 'C');
        $this->Ln(10);
        $header = array('No.', 'Nombre del Servicio', 'Objetivo', 'Período de Realización', 'Lugar o Sede', 'No. de horas', 'Instructor', 'Dirigido A', 'Prerrequisitos');
        $w = array(10, 30, 60, 30, 25, 20, 30, 25, 30);
        $this->SetWidths($w);
        $this->SetLineHeight(5);
        $this->Row($header, 'C', true);
        $this->SetFont('Arial', '', 10);
        $sql = "SELECT * FROM cursosactivos WHERE estado = 'Activo'|| Estado = 'En espera'";
        $result = mysqli_query($conn, $sql);
        $cont = 1;
        while ($row = mysqli_fetch_array($result)) {
            $data = array($cont, $row['NombreCurso'], $row['Objetivo'], $row['Periodo'], $row['Lugar'], $row['Horas'] . " horas", $row['Instructor'], 'Docentes del área de ' . $row['DirigidoA'], $row['PreRR']);
            $this->Row($data, 'C', true);
            $y = $this->GetY();
            if (((170 - $y) < 25))
                $this->AddPage();
            $cont++;
        }
        $this->SetXY(70, 170);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(70, 5, 'Elaboró (Jefe de Desarrollo Académico)', 1, 0, 'C');
        $this->Cell(70, 5, 'Aprobó (Subdireccion Académica)', 1, 1, 'C');
        $this->SetX(70);
        $this->SetFont('Arial', '', 10);
        $this->Cell(70, 15, $nombreC[0], 1, 0, 'C');
        $this->Cell(70, 15, $nombreC[1], 1, 1, 'C');
        $this->SetX(70);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(70, 5, 'Nombre y firma', 1, 0, 'C');
        $this->Cell(70, 5, 'Nombre y firma', 1, 1, 'C');
        $y = $this->GetY();
        $this->SetX(70);
        $this->Rect(70, $y, 140, 5, 'D');
        date_default_timezone_set('America/Hermosillo');
        $hoy = getdate();
        $day = $hoy['mday'];
        if ($day < 10)
            $day = '0' . $day;
        $fecha = $day . ' de ' . $this->Fecha($hoy['mon']) . ' del ' . $hoy['year'];
        $x =  (70 - strlen('Fecha: ' . $fecha)) / 2;
        $x = $x * 2.15;
        $this->SetX(70 + $x);
        $this->Write(5, 'Fecha: ');
        $this->SetFont('Arial', '', 10);
        $this->Write(5, $fecha);
    }

    function Fecha($m)
    {
        switch ($m) {
            case 1:
                return 'Enero';
            break;
            case 2:
                return 'Febrero';
            break;
            case 3:
                return 'Marzo';
            break;
            case 4:
                return 'Abril';
            break;
            case 5:
                return 'Mayo';
            break;
            case 6:
                return 'Junio';
            break;
            case 7:
                return 'Julio';
            break;
            case 8:
                return 'Agosto';
            break;
            case 9:
                return 'Septiembre';
            break;
            case 10:
                return 'Octubre';
            break;
            case 11:
                return 'Noviembre';
            break;
            case 12:
                return 'Diciembre';
            break;
        }
    }
}

$pdf = new PDF('L');
$pdf->SetTitle('Lista de Cursos', true);
$pdf->SetAutoPageBreak(true);
$pdf->AddPage();
$pdf->Datos($conn, $nombreC);
##$pdf->Output('F', './Archivos/Lista de Cursos.pdf', true);
$pdf->Output('I', 'Lista de Cursos.pdf', true);
?>