<?php
Yii::import('application.extensions.fpdf.*');	
//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',18);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();
$pdf = new PDF_pelunasan('P','mm','A4');
$pdf->setUnitKerja($unitKerja);
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Line(100,55,10,55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,0,'NO Rekening :',0,0,'R');
$pdf->Cell(0,0,$model_pelunasan->no_rekening,0,1,'L');

$pdf->Cell(40,10,'Nama Nasabah :',0,0,'R');
$pdf->Cell(40,10,$model_pelunasan->nama_nasabah,0,1,'L');

$pdf->Cell(40,0,'Periode :',0,0,'R');
$pdf->Cell(40,0,$model_pelunasan->from_date . ' S/D '. $model_pelunasan->to_date,0,1,'L');

$columns = array();      
   
// header col
$col = array();
$col[] = array('text' => 'No', 'width' => '10', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Tgl.Pelunasan', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Nama Nasabah', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'No Rekening', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Penyebab', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;

foreach ($data as $key => $value) {    
    $col = array();
    $col[] = array('text' => $value['index'], 'width' => '10', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['tanggal_pelunasan'], 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['nama_nasabah'], 'width' => '50', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['no_rekening'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['penyebab'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
    $columns[] = $col;
    
    
}
$pdf->SetY($pdf->GetY()+5);

$pdf->WriteTable($columns); 

$pdf->Output();
$pdf->Output('LaporanNasabahTolak.pdf','D');
?>
