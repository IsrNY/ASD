<?php
include 'conn.php';
include 'FPDF/fpdf.php';
$clave = $_POST['txCla'];

$sql = "SELECT Nombre, Apellidos FROM usuarios WHERE Usuario = 'da'";
$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result))
    $coord = $row['Nombre'] . ' ' . $row['Apellidos'];

class PDF extends FPDF
{
    protected $C;
    function Header()
    {
        $this->SetFont('Arial', 'B', 6);
        $this->Cell(70, 15, $this->Image('img/logoedu.png', 10, 10, 70, 15), 1, 0, 'C');
        $this->Cell(108, 10, 'Lista de Asistencia', 1, 2, 'L');
        $this->Cell(108, 5, 'Referencia a la Norma ISO 9001:2015 y la NMX-R-025-SCFI-2015', 1, 0, 'L');
        $this->SetXY(188, 10);
        $this->Cell(40, 5, 'Código: M00-5C-020-R07', 1, 2, 'C');
        $this->Cell(40, 5, 'Revisión: 0', 1, 2, 'C');
        $this->cell(40, 5, 'Página ' . $this->PageNo() . ' de {nb}', 1, 0, 'C');
        $this->SetXY(228, 10);
        $this->Cell(42, 15, $this->image('img/logotecnm.png', 228, 12.5, 41, 10), 1, 0, 'C');
        $this->Ln(15);
        $this->SetX(48);
        $this->SetFont('Arial', '', 6);
        $this->Cell(32, 5, 'CENTRO DE TRABAJO', 0, 0, 'C');
        $this->Cell(90, 5, 'HUATABAMPO', 'B', 0, 'C');
        $this->SetX(180);
        $this->Cell(10, 5, 'Hoja', 0, 0, 'C');
        $this->Cell(20, 5, $this->PageNo(), 'B', 0, 'C');
        $this->SetX(215);
        $this->Cell(10, 5, 'de', 0, 0, 'C');
        $this->Cell(20, 5, '{nb}', 'B', 0, 'C');
        $this->Ln(5);
        $this->SetX(48);
        $this->Cell(32, 5, 'CLAVE DEL CURSO', 0, 0, 'C');
        $this->Cell(90, 5, '', 'B', 0, 'C');
        $this->Ln(5);
        $this->SetX(20);
        $this->Cell(32, 5, 'NOMBRE DEL CURSO', 0, 0, 'C');
        $this->Cell(217, 5, $_POST['curso'], 'B', 0, 'C');
        $this->Ln(5);
        $this->SetX(20);
        $this->Cell(43, 5, 'NOMBRE DEL INSTRUCTOR(A)', 0, 0, 'C');
        $this->Cell(206, 5, $_POST['instructor'], 'B', 0, 'C');
        $this->Ln(5);
        $this->SetX(65);
        $this->Cell(15, 5, 'PERIODO', 0, 0, 'C');
        $this->Cell(110, 5, $_POST['periodo'], 'B', 0, 'C');
        $this->SetX(195);
        $this->Cell(16, 5, 'DURACIÓN', 0, 0, 'C');
        $this->Cell(35, 5, $_POST['duracion'], 'B', 0, 'C');
        $this->Ln(5);
        $this->SetX(65);
        $this->Cell(15, 5, 'HORARIO', 0, 0, 'C');
        $this->Cell(110, 5, $_POST['horario'], 'B', 0, 'C');
        $this->Ln(7);
        $this->SetFont('Arial', 'B', 6);
        $header = array('No.', 'NOMBRE DEL PARTICIPANTE', 'R.F.C.', 'AREA DE ADSCRIPCIÓN', 'SEXO', 'D/A', 'ASISTENCIA', 'L', 'M', 'M', 'J', 'V');
        $dias = array('L', 'M', 'M', 'J', 'V');
        $w = array(10, 60, 35, 60, 10, 7);
        for ($i = 0; $i <= 5; $i++)
            $this->Cell($w[$i], 15, $header[$i], 1, 0, 'C');
        $this->cell(77, 10, 'Asistencia', 1, 2, 'C');
        for ($i = 0; $i < 5; $i++)
            $this->Cell(15.4, 5, $dias[$i], 1, 0, 'C');
        $this->Ln(5);
    }

    function Tabla($conn, $clave, $coord)
    {
        $this->CurFin($conn, $_POST['rfci'], $clave, $_POST['curso'], $_POST['dirigido']);
        $this->C = $coord;
        $w = array(10, 60, 35, 60, 10, 7);
        $i = 1;
        $sql = "SELECT nombreParticipante, RFC, areaAdsc, sexo, DirAd FROM cursosparticipantes WHERE registradoCurso = '$clave' ORDER BY nombreParticipante ASC";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $this->Cell($w[0], 5, $i, 1, 0, 'C');
            $this->Cell($w[1], 5, $row['nombreParticipante'], 1, 0, 'C');
            $this->Cell($w[2], 5, $row['RFC'], 1, 0, 'C');
            $this->Cell($w[3], 5, $row['areaAdsc'], 1, 0, 'C');
            $this->Cell($w[4], 5, $row['sexo'], 1, 0, 'C');
            $this->Cell($w[5], 5, $row['DirAd'], 1, 0, 'C');
            $d = array('Lun', 'Mar', 'Mier', 'Juev', 'Vier');
            $dx = array();
            $a = 0;
            for ($j = 0; $j < 5; $j++) {
                if (isset($_POST[$row['RFC'] . $d[$j]]) && $_POST[$row['RFC'] . $d[$j]]) {
                    array_push($dx, 'X');
                    $a++;
                }
                else
                    array_push($dx, '');
            }
            for ($j = 0; $j < 5; $j++)
                $this->Cell(15.4, 5, $dx[$j], 1, 0, 'C');
            if ($i % 20 == 0)
                $this->AddPage();
            else
                $this->Ln(5);
            $i++;
            if ($a == 5)
                $this->CurFin($conn, $row['RFC'], $clave, $_POST['curso'], $_POST['dirigido']);
        }
        $c = $this->PageNo() * 20;
        for (; $i <= $c; $i++) {
            $this->Cell(10, 5, $i, 1, 0, 'C');
            for ($j = 1; $j <= 5; $j++)
                $this->Cell($w[$j], 5, '', 1, 0, 'C');
            for ($j = 0; $j < 5; $j++)
                $this->Cell(15.4, 5, '', 1, 0, 'C');
            if ($i % 20 == 0)
                $this->Ln(45);
            else
                $this->Ln(5);
        }
        $this->TermCurso($conn, $clave);
    }

    function CurFin($conn, $rfc, $clave, $curso, $dirigido)
    {
        $sql = "INSERT INTO cursoscompletados(RFCparticipante, claveCurso, nombreCurso, DirigidoA,constancia) VALUES('$rfc', '$clave', '$curso', '$dirigido','')";
        mysqli_query($conn, $sql);
    }

    function TermCurso($conn, $clave)
    {
        $sql = "UPDATE cursosactivos SET Estado = 'Finalizado' WHERE Clave = '$clave'";
        mysqli_query($conn, $sql);
    }

    function Footer()
    {
        $this->SetY(172);
        $this->Cell(15, 5, 'H = Hombre', 0, 0, 'C');
        $this->SetX(35);
        $this->Cell(15, 5, 'M = Mujer', 0, 0, 'C');
        $this->Ln(5);
        $this->SetX(9.5);
        $this->Cell(18, 5, 'D = Directivos', 0, 0, 'C');
        $this->SetX(33.7);
        $this->Cell(33, 5, 'A = Apoyo a la Educación', 0, 0, 'C');
        $this->Ln(7);
        $this->SetX(20);
        $this->Cell(60, 5, $_POST['instructor'], 'B', 2, 'C');
        $this->Cell(60, 5, 'NOMBRE Y FIRMA DEL INSTRUCTOR', 0, 0, 'C');
        $this->SetXY(185, 184);
        $this->Cell(84, 5, $this->C, 'B', 2, 'C');
        $this->Cell(84, 5, 'NOMBRE Y FIRMA DEL COORDINADOR', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(22, 5, 'M00-5C-020-R07', 0, 0, 'C');
    }
}

$pdf = new PDF('L');
$campo = array('RFC', 'Area', 'Sexo', 'DA', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes');
$pdf->SetFont('Arial', '', 6);
$pdf->SetTitle('Lista de Asistencia', true);
$pdf->SetAutoPageBreak(true);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Tabla($conn, $clave, $coord);
#$pdf->Output('I', 'Lista de Asistencia ' . $_POST['curso'] . '.pdf', true);
$pdf->Output('D', 'Lista de Asistencia ' . $_POST['curso'] . '.pdf', true);
header('location:CActivos.php');
?>