<?php
$this->breadcrumbs=array(
	'Rekap Quistionaire',
);
?>
<h1 class="loginHead">Kriteria</h1>
<?php  echo $this->renderPartial('_search', array('model_jawab'=>$model_jawab,'listUnit' => $listUnit,)); ?>
<div class='survey'>
<div class='head-survey'>Laporan</div>
<div class='soal_jawab'>
<?php 
$i = 1;
foreach ($arrSoal as $key => $value) {  
    echo "<div class='soal'>".$i." "."$value";
    echo "</div>";
    echo "<table>";    
    foreach ($arrResult[$key] as $key_j => $value_j) {
        foreach ($value_j as $key_ja => $value_ja) {
            echo "<tr class='jawab span8'><td>";
            echo "$key_j (";
            echo "$value_ja%)";                
            echo "</td></tr>";
        }
    }    
    echo "</table>";
    $i++;   
}
?>
</div>
</div>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl('question/print'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>
<input name="voteJawab[unit_kerja]" id="print_from_plafon" type="hidden" value="<?php echo $model_jawab->unit_kerja; ?>" />
<input name="voteJawab[from_date]" id="print_from_date" type="hidden" value="<?php echo $model_jawab->from_date; ?>" />
<input name="voteJawab[to_date]" id="print_to_date" type="hidden" value="<?php echo $model_jawab->to_date; ?>" />
<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'danger',
                'label'=>'Cetak Laporan',
		)); ?>
    </div>
<?php $this->endWidget(); ?>