<?php
Yii::import('application.extensions.fpdf.*');	
//$pdf = new FPDF();
//$pdf->AddPage();
//$pdf->SetFont('Arial','B',18);
//$pdf->Cell(40,10,'Hello World!');
//$pdf->Output();
$pdf = new PDF_laporan_wm('P','mm','A4');
$pdf->setDivisi('CS');
$pdf->AliasNbPages();
$pdf->AddPage();

//$pdf->Line(100,55,10,55);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,0,'Jenis Nasabah :',0,0,'R');
$pdf->Cell(0,0,$model->kriteria_nasabah,0,1,'L');

$pdf->Cell(40,10,'Periode :',0,0,'R');
$pdf->Cell(40,10,$model->from_date . ' SD '. $model->to_date,0,1,'L');
    
$pdf->Cell(40,0,'Nama Pegawai :',0,0,'R');
$pdf->Cell(40,0,$model->nama_pegawai,0,1,'L');


$columns = array();    
    
   
// header col
$col = array();
$col[] = array('text' => 'No', 'width' => '10', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Tanggal Laporan', 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Nama Pegawai', 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'No Kontak', 'width' => '20', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Kriteria Nasabah', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Info', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Jumlah Nasabah', 'width' => '25', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$col[] = array('text' => 'Total Setor', 'width' => '30', 'height' => '5', 'align' => 'C', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;

foreach ($data as $key => $value) {    
    $col = array();
    $col[] = array('text' => $value['index'], 'width' => '10', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['tanggal'], 'width' => '20', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['nama_pegawai'], 'width' => '20', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['no_kontak'], 'width' => '20', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['kriteria_nasabah'], 'width' => '30', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['info'], 'width' => '30', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
    $col[] = array('text' => $value['jumlah'], 'width' => '25', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
    $col[] = array('text' => $value['total'], 'width' => '30', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
    $columns[] = $col;
}

$col = array();
$col[] = array('text' => 'Total', 'width' => '130', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
$col[] = array('text' => $total_nasabah, 'width' => '25', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
$col[] = array('text' => $total_setor, 'width' => '30', 'height' => '5', 'align' => 'R', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');       
$columns[] = $col;

$pdf->SetY($pdf->GetY()+5);
$pdf->SetX(10);
$pdf->WriteTable($columns); 

$pdf->Output();
$pdf->Output('LaporanProposal.pdf','D');
?>