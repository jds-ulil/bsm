<?php
Yii::import('application.extensions.fpdf.*');	
//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',18);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();
$pdf = new PDF('P','mm','A4');
$pdf->setUnitKerja($unitKerja);
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Line(100,55,10,55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,0,'Nama Marketing :',0,0,'R');
$pdf->Cell(0,0,$model_proposal->marketing,0,1,'L');

$pdf->Cell(40,10,'Segmen :',0,0,'R');
if(!intval($model_proposal->segmen)){
    $pdf->Cell(40,10,'Semua Segmen',0,1,'L');    
} else {
    $pdf->Cell(40,10,$model_proposal->rSeg->nama,0,1,'L');
$pdf->Cell(40,10,$model_proposal->segmen,0,1,'L');
}

$pdf->Cell(40,0,'Jenis Usaha :',0,0,'R');
$pdf->Cell(40,0,$model_proposal->jenis_usaha,0,1,'L');

$pdf->Cell(40,10,'Plafon :',0,0,'R');
$pdf->Cell(40,10,$model_proposal->from_plafon . ' S/D '. $model_proposal->to_plafon,0,1,'L');

$pdf->Cell(40,0,'Periode :',0,0,'R');
$pdf->Cell(40,0,$model_proposal->from_date . ' S/D '. $model_proposal->to_date,0,1,'L');


$columns = array();      
   
// header col
$col = array();
$col[] = array('text' => 'No', 'width' => '10', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Nama Nasabah', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Tgl.Pengajuan', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Plafon', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Jenis Usaha', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;
foreach ($data as $key => $value) {    
    $col = array();
    $col[] = array('text' => $value['index'], 'width' => '10', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['nama_nasabah'], 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['tanggal_pengajuan'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['plafon'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['jenis_usaha'], 'width' => '50', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
    $columns[] = $col;
}
$col = array();
$col[] = array('text' => 'Jumlah', 'width' => '95', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
$col[] = array('text' => $total, 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
$col[] = array('text' => '', 'width' => '50', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
$columns[] = $col;
$pdf->SetY($pdf->GetY()+5);

$pdf->WriteTable($columns); 

$pdf->Output();
$pdf->Output('LaporanProposal.pdf','D');
?>
