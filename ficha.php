<?php
include 'conn.php';
include 'FPDF/multicell.php';
$sql = "SELECT Nombre, Apellidos FROM usuarios WHERE Usuario = 'da'";
    $query = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_array($query)) {
        $nom = $row["Nombre"];
        $apellidos = $row["Apellidos"];
        $nombreCompleto = $nom." ".$apellidos;
    }
class PDF extends FPDF_Multicell
{
    function Datos($nombreCompleto)
    {
        $this->SetFont('Arial','B',10);
        $this->SetX(10);
        $this->Cell(0,5,"FICHA TÉCNICA DEL SERVICIO DE ACTUALIZACIÓN PROFESIONAL Y ",0,1,'C');
        $this->SetX(10);
        $this->Cell(0,5,"FORMACIÓN DOCENTE",0,1,'C');
        $this->SetX(10);
        $this->Cell(0,5,"M00-SC-029-A02",0,1,'C');
        $this->SetX(10);
        $this->Ln(7);
        $this->SetX(20);
        $this->Write(5,'Instituto Tecnológico o Centro o Unidad: ' );
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txInst']);
        $this->Ln(7);
        $this->SetX(20);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'Nombre del servicio: ', );
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txNomSer']);
        $this->Ln(7);
        $this->SetX(20);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'Instructor(a): ');
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txInstr']);
        $this->SetX(10);
        $this->Ln(7);
        $this->SetX(30);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'- Introducción: ');
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txIntrod']);
        $this->Ln(7);
        $this->SetX(30);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'- Justificación: ');
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txJustificacion']);
        $this->Ln(7);
        $this->SetX(30);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'- Objetivo General: ');
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txObjetivoG']);
        $this->Ln(7);
        $this->SetX(30);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'- Descripción del servicio: ');
        $this->Ln(5);
        $this->SetX(40);
        $this->Write(5,'a. Especificar tipo de servicio: ');
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txTSer']);
        $this->Ln(10);
        $this->SetX(40);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'b. Duración en horas del curso: ');
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txDur']);
        $this->Ln(10);
        $y = $this->GetY();
        if ($y > 200)
            $this->AddPage();
        $this->SetX(40);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'c. Contenido temático del curso ');
        $this->Ln(7);
        $header = array('Temas / Subtemas','Tiempo programado (Hrs)','Actividades de aprendizaje');
        $w = array(60,45,55);
        $this->SetWidths($w);
        $this->SetFillColor(208,206,206);
        $this->SetLineHeight(5);
        for($i=0;$i<3;$i++)
        {
            $this->Cell($w[$i],5,$header[$i],1,0,'C',true);
        }
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        for($i=1;$i<=4;$i++)
        {
            $this->Row(array($_POST['txTemSub' . $i],$_POST['txTP' . $i],$_POST['txAApr' . $i]),'C','TBLR');
        }
        $this->Ln(7);
        $this->SetX(40);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'d. Elementos didácticos para el desarrollo del curso: ' );
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txEDC']);
        $this->Ln(7);
        $this->SetX(40);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'e. Críterios de evaluación ');
        $this->Ln(5);
        $header = array('No.','Críterio','Valor','Instrumentos de evaluación');
        $w = array(15,65,20,60);
        $this->SetWidths($w);
        $this->SetFillColor(208,206,206);
        $this->SetLineHeight(5);
        for($i=0;$i<4;$i++)
        {
            $this->Cell($w[$i],5,$header[$i],1,0,'C',true);
        }
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        for($i=1;$i<=3;$i++)
        {
            $this->Row(array($i,$_POST['txCriterio' . $i],$_POST['txValor' . $i].'%',$_POST['txInstrumento' . $i]),'C','TBLR');
        }
        $this->Ln(3);
        $this->SetX(30);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'- Competencias a desarrollar: ' );
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txCompDes']);
        $this->Ln(7);
        $this->SetX(30);
        $this->SetFont('Arial','B',10);
        $this->Write(5,'- Fuentes de información: ' );
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        $this->Write(5,$_POST['txFuentesI']);
        $this->Ln(20);
        $this->Cell(60,5,$_POST['txN'],'B',0,'C');
        $this->SetX(130);
        $this->Cell(60, 5,$nombreCompleto, 'B', 1, 'C');
        $this->SetFont('Arial','B',10);
        $this->Cell(60,5,'Nombre y Firma del facilitador',0,0,'C',);
        $this->SetX(130);
        $this->SetFont('Arial','B',10);
        $this->Cell(60,5,"Nombre y firma del(a) Jefe(a) de DA",0,0,'C');
        $this->Ln(10);
    }
}
$clave = $_POST['txCl'];
$pdf = new PDF();
$pdf->SetTitle("Ficha técnica $clave",true);
$pdf->SetAutoPageBreak(true);
$pdf->SetLeftMargin(30);
$pdf->SetRightMargin(20);
$pdf->SetTopMargin(20);
$pdf->AddPage();
$pdf->Datos($nombreCompleto);
#$pdf->Output('I', 'fichatecnica.pdf',true);
$pdf->Output('F','./Archivos/FichasTecnicas/Ficha técnica '.$clave.'.pdf',true);
$sql = "UPDATE cursosactivos SET fichaTecnica = 'Si' WHERE Clave = '$clave'";
$query = mysqli_query($conn,$sql);
header("location:instructor.php?clave=$clave");
?>