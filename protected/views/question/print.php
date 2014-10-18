<?php
Yii::import('application.extensions.fpdf.*');	
$pdf = new PDF_vote('P','mm','A4');
$pdf->AliasNbPages();
$pdf->AddPage();

$col = array();
$col[] = array('text' => 'Hasil', 'width' => '190', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'B', 'fillcolor' => '2,93,68', 'textcolor' => '255,255,255', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');
$columns[] = $col;

$i = 1;
foreach ($arrSoal as $key => $value) {  
    $col = array();  
    $col[] = array('text' => $i." ".$value, 'width' => '190', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => 'i', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');    
    $columns[] = $col;
    foreach ($arrResult[$key] as $key_j => $value_j) {
        foreach ($value_j as $key_ja => $value_ja) {
        $col = array();  
            $col[] = array('text' =>$key_j, 'width' => '55', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');    
            $col[] = array('text' =>$value_ja." persen", 'width' => '135', 'height' => '5', 'align' => 'L', 'font_name' => 'Arial', 'font_size' => '8', 'font_style' => '', 'fillcolor' => '255,255,255', 'textcolor' => '0,0,0', 'drawcolor' => '0,0,0', 'linewidth' => '0.4', 'linearea' => 'LTBR');    
        $columns[] = $col;            
        }
    }    
 $i++;       
}

//$columns[] = $col;

$pdf->SetY($pdf->GetY()+5);

$pdf->WriteTable($columns); 
$pdf->Output();
$pdf->Output('LaporanKuisioner.pdf','D');
?>