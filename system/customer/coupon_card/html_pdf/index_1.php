
<?php
require('html2pdf.php');
$card = @$_GET["ca"];
if(true)
{
    $toolcopy = ' my content <br>';
$toolcopy .= '<img   src="https://sc02.alicdn.com/kf/HTB1dHPLLpXXXXXCXXXXq6xXFXXXZ/z88189A-hot-sexy-girl-women-red-lace.jpg_350x350.jpg"/><br> other content';
    $pdf=new PDF_HTML();
    $pdf->SetFont('Arial','',12);
    $pdf->AddPage();
    $pdf->WriteHTML(@$toolcopy, true, 0, true, 0);
    $pdf->Output();
    exit;
}
?>
