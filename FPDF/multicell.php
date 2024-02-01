<?php
require('fpdf.php');

class FPDF_Multicell extends FPDF
{
    var $widths;
    var $aligns;
    var $lineHeight;

    function SetWidths($w)
    {
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        $this->aligns = $a;
    }

    function SetLineHeight($h)
    {
        $this->lineHeight = $h;
    }

    function Row($data, $a = 'L', $border = false, $fill = false, $fn = false, $f = 'Arial', $s = 10)
    {
        $nb = 0;
        for ($i = 0; $i < count($data); $i++)
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        $h = $this->lineHeight * $nb;
        $this->CheckPageBreak($h);
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $x = $this->GetX();
            $y = $this->GetY();
            if ($border and $fill)
                $this->Rect($x, $y, $w, $h, 'DF');
            else {
                if ($border)
                    $this->Rect($x, $y, $w, $h, 'D');
                if ($fill)
                    $this->Rect($x, $y, $w, $h, 'F');
            }
            if ($fn) {
                if ($i == 0)
                    $this->SetFont($f, 'B', $s);
                else if ($i == 1)
                    $this->SetFont($f, '', $s);
            }
            $this->MultiCell($w, $this->lineHeight, $data[$i], 0, $a);
            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        $cw =& $this->CurrentFont['cw'];
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n")
            $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ')
                $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j)
                        $i++;
                }
                else
                    $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }
}
?>