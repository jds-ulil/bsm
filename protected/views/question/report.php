<?php
$this->breadcrumbs=array(
	'Rekap Quistionaire',
);
?>
<h1 class="loginHead">Kriteria</h1>
<?php echo $this->renderPartial('_search', array('model_jawab'=>$model_jawab)); ?>
<div class='survey'>
<div class='head-survey'>Laporan</div>
<div class='soal_jawab'>
<?php 
$i = 1;
foreach ($arrSoal as $key => $value) {  
    echo "<div class='soal'>".$i." "."$value";
    echo "</div>";
    foreach ($arrResult[$key] as $key_j => $value_j) {
        foreach ($value_j as $key_ja => $value_ja) {
            echo "<div class='jawab'>";
            echo "$key_j (";
            echo "$value_ja)";
                echo "</div>";
        }
    }
    $i++;   
}
?>
</div>
</div>