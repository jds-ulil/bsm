<?php
Yii::import('application.extensions.fpdf.*');	
//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',18);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();
$pdf = new PDF_tolak('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Line(100,55,10,55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,0,'Nama Marketing :',0,0,'R');
$pdf->Cell(0,0,$model_tolak->marketing_search,0,1,'L');

$pdf->Cell(40,10,'Tahap penolakan :',0,0,'R');
$pdf->Cell(40,10,$model_tolak->tahap_penolakan,0,1,'L');

$pdf->Cell(40,00,'Nama Nasabah :',0,0,'R');
$pdf->Cell(40,0,$model_tolak->nama_nasabah,0,1,'L');

$pdf->Cell(40,10,'Periode :',0,0,'R');
$pdf->Cell(40,10,$model_tolak->from_date . ' S/D '. $model_tolak->to_date,0,1,'L');

$columns = array();      
   
// header col
$col = array();
$col[] = array('text' => 'No', 'width' => '10', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Tgl.Tolak', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Tahap Penolakan', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Marketing', 'width' => '35', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Nama Nasabah', 'width' => '50', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;

foreach ($data as $key => $value) {    
    $col = array();
    $col[] = array('text' => $value['index'], 'width' => '10', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['tanggal_tolak'], 'width' => '50', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['tahap_penolakan'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['marketing'], 'width' => '35', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['nama_nasabah'], 'width' => '50', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
    $columns[] = $col;
}
$pdf->SetY($pdf->GetY()+5);

$pdf->WriteTable($columns); 

$pdf->Output();
$pdf->Output('LaporanNasabahTolak.pdf','D');
?>
