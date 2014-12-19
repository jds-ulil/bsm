<?php
Yii::import('application.extensions.fpdf.*');	
//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',18);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();
$pdf = new PDF_naspoma('P','mm','A4');
$pdf->setUnitKerja($unitKerja);
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Line(100,55,10,55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,0,'Nama Nasabah :',0,0,'R');
$pdf->Cell(0,0,$model->nama,0,1,'L');

$pdf->Cell(40,10,'Segmen :',0,0,'R');
if(!intval($model->segmen)){
    $pdf->Cell(40,10,'Semua Segmen',0,1,'L');    
} else {
    $pdf->Cell(40,10,$model_proposal->rSeg->nama,0,1,'L');
}

$pdf->Cell(40,0,'Jenis Pembiayaan :',0,0,'R');
$pdf->Cell(40,0,$model->jenis_pembiayaan,0,1,'L');

$pdf->Cell(40,10,'Jenis Usaha :',0,0,'R');
$pdf->Cell(40,10,$model->jenis_usaha,0,1,'L');

$pdf->Cell(40,0,'Periode :',0,0,'R');
$pdf->Cell(40,0,$model->kolektibilitas_terakhir,0,1,'L');


$columns = array();      
   
// header col
$col = array();
$col[] = array('text' => 'No', 'width' => '10', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Nama Nasabah', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'No Rekening', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Jenis Pembiayaan', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Marketing', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;
foreach ($data as $key => $value) {    
    $col = array();
    $col[] = array('text' => $value['index'], 'width' => '10', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['nama'], 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['no_rekening'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['jenis_pembiayaan'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['marketing'], 'width' => '50', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
    $columns[] = $col;
}

$pdf->SetY($pdf->GetY()+5);

$pdf->WriteTable($columns); 

$pdf->Output();
$pdf->Output('LaporanProposal.pdf','D');
?>
