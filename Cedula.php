<?php
include 'conn.php';
include 'FPDF/fpdf.php';

$clave = $_POST['claveCurso'];
$rfc = $_POST['rfc'];
$np = $_POST['txNombre'] . ' ' . $_POST['txApellidos'];
$area = $_POST['areaAdscripcion'];
$sexo = '';
if ($_POST['txSexo'] == 'Hombre')
    $sexo = 'H';
else
    $sexo = 'M';
$da = '';
if(strcasecmp($_POST['rdDir'], 'rdDirectivo') == 0)
    $da = 'D';
else
    $da = 'A';

class PDF extends FPDF
{
    function Datos()
    {
        $this->Image('img/logoTecNM.png', 124, 10, 0, 18);
        $y = $this->GetY() + 20;
        $this->Image('img/logoedu.png', 20, 20, 0, 20);
        $this->SetFont('Arial', 'B', 11);
        $this->SetXY(115, $y);
        $this->Cell(90, 5, 'TECNOLÓGICO NACIONAL DE MÉXICO', 0, 2, 'R');
        $this->Cell(90, 5, 'Secretaría de Administración', 0, 2, 'R');
        $this->Cell(90, 5, 'Dirección de Personal', 0, 1, 'R');
        $this->SetFont('Arial', 'B', 14);
        $this->Ln(5);
        $this->Cell(0, 6, 'CÉDULA DE INSCRIPCIÓN', 0, 0, 'C');
        $this->Ln(10);
        $this->SetX(135);
        date_default_timezone_set('America/Hermosillo');
        $hoy = getdate();
        $dia = $hoy['mday'];
        if ($dia < 10)
            $dia = '0' . $dia;
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(20, 5, 'Fecha', 0, 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 5, $dia . '/' . $this->Fecha($hoy['mon']) . '/' . $hoy['year'], 'B', 1, 'C');
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 7, 'DATOS DEL EVENTO', 0, 0, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', '', 10);
        $this->Cell(45, 6, 'CLAVE DEL CURSO: ', 0, 0, 'L');
        $this->Cell(0, 6,'', 'B', 1, 'C');
        $this->Cell(48, 6, 'NOMBRE DEL CURSO: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['nombreCurso'], 'B', 1, 'C');
        $this->Cell(100, 6, 'NOMBRE DEL INSTRUCTOR(A) RESPONSABLE: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['nombreInstructor'], 'B', 1, 'C');
        $this->Cell(60, 6, 'PERIODO DE REALIZACIÓN: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['periodoRealizacion'], 'B', 1, 'C');
        $this->Cell(25, 6, 'HORARIO: ', 0, 0, 'L');
        $this->Cell(90, 6, $_POST['horario'], 'B', 0, 'C');
        $this->Cell(28, 6, 'DURACIÓN: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['duracion'], 'B', 0, 'C');
        $this->Ln(15);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 6, 'DATOS PERSONALES', 0, 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Ln(5);
        $this->SetX(118);
        $s = $_POST['txSexo'];
        $h = '';
        $m = '';
        if ($s == 'Hombre')
            $h = 'X';
        else 
            $m = 'X';
        $this->Cell(20, 6, 'HOMBRE', 0, 0, 'C');
        $this->Cell(25, 6, '( ' . $h .' )', 0, 0, 'C');
        $this->Cell(20, 6, 'MUJER', 0, 0, 'C');
        $this->Cell(25, 6, '( ' . $m .' )', 0, 1, 'C');
        $this->Cell(23, 6, 'NOMBRE: ', 0, 0, 'L');
        $this->Cell(86.3, 6, $_POST['txNombre'], 'B', 0, 'C');
        $this->Cell(86.3, 6, $_POST['txApellidos'], 'B', 1, 'C');
        $this->SetX(33);
        $this->Cell(86.3, 6, 'NOMBRE(S)', 0, 0, 'C');
        $this->Cell(86.3, 6, 'APELLIDOS', 0, 1, 'C');
        $this->Cell(12, 6, 'RFC: ', 0, 0, 'L');
        $this->Cell(84.4, 6, $_POST['rfc'], 'B', 0, 'C');
        $this->Cell(15, 6, 'CURP: ', 0, 0, 'L');
        $this->Cell(84.4, 6, $_POST['curp'], 'B', 1, 'C');
        $this->Cell(55, 6, 'CORREO ELECTRÓNICO: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['correoElectronico'], 'B', 1, 'C');
        $this->Cell(68, 6, 'GRADO MÁXIMO DE ESTUDIOS: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['gradoMaximoE'], 'B', 1, 'C');
        $this->Cell(58, 6, 'NOMBRE DE LA CARRERA: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['nombreCarrera'], 'B', 0, 'C');
        $this->Ln(15);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 6, 'DATOS LABORALES', 0, 0, 'C');
        $this->SetFont('Arial', '', 10);
        $this->Ln(5);
        $this->SetX(15);
        $d = ' ';
        $a = ' ';
        if(strcasecmp($_POST['rdDir'], 'rdDirectivo') == 0)
            $d = 'X';
        else
            $a = 'X';
        $this->Cell(22, 6, 'DIRECTIVO', 0, 0, 'C');
        $this->Cell(25, 6, '( ' . $d . ' )', 0, 0, 'C');
        $this->SetX(68);
        $this->Cell(113, 6, 'APOYO A LA EDUCACIÓN O DOCENTE CON ACTIVIDADES ADMINISTRATIVAS', 0, 0, 'C');
        $this->Cell(30, 6, '( ' . $a . ' )', 0, 1, 'C');
        $this->Cell(70, 6, 'INSTITUTO TECNOLÓGICO O CENTRO: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['institutoToC'], 'B', 1, 'C');
        $this->Cell(45, 6, 'AREA DE ADSCRIPCIÓN: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['areaAdscripcion'], 'B', 1, 'C');
        $this->Cell(50, 6, 'PUESTO QUE DESEMPEÑA: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['puestoDesempena'], 'B', 1, 'C');
        $this->Cell(58, 6, 'NOMBRE DEL JEFE INMEDIATO: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['nombreJefe'], 'B', 1, 'C');
        $this->Cell(39, 6, 'TELÉFONO OFICIAL: ', 0, 0, 'L');
        $this->Cell(85, 6, $_POST['telefonoOficial'], 'B', 0, 'C');
        $this->SetX(155);
        $this->Cell(10, 6, 'EXT: ', 0, 0, 'L');
        $this->Cell(0, 6, $_POST['ext'], 'B', 1, 'C');
        $this->Cell(20, 6, 'HORARIO: ', 0, 0, 'L');
        $this->Cell(104, 6, $_POST['txHorarioL'], 'B', 0, 'C');
        $this->Ln(25);
        $this->SetX(134);
        $this->Cell(71.8, 6, 'FIRMA', 'T', 1, 'C');
        $this->Ln(15);
        $this->Write(6, 'M00-SC-020-R06');
        $this->SetX(190.8);
        $this->Write(6, 'REV. 0');
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

$pdf = new PDF();
$pdf->SetTitle('Cédula de Inscripción ' . $clave . ' ' . $rfc, true);
$pdf->SetAutoPageBreak(true);
$pdf->AddPage();
$pdf->Datos();
$pdf->Output('F', './Archivos/Cedulas/Cédula de Inscripción ' . $clave . ' ' . $rfc . '.pdf', true);
#$pdf->Output('I', 'Cédula de Inscripción ' . $clave . ' ' . $rfc . '.pdf', true);
$sql = "INSERT INTO cursosparticipantes(nombreParticipante, RFC, areaAdsc, sexo, DirAd,cedulaInscripcion,registradoCurso) VALUES('$np','$rfc','$area','$sexo','$da','Si','$clave')";
$query = mysqli_query($conn, $sql);
header('location:descripcionCurso.php?clave=' . $clave);
?>