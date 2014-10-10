<?php
$this->breadcrumbs=array(
	'Quistionaire',
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mtb-user-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        ),
)); ?>
<div class='survey'>
<div class='head-survey'>Quistionaire</div>
<div class='soal_jawab'>
<?php
 $i = 1;
 foreach ($model_soal as $key => $model_soalEach) {  
     echo "<div class='soal'>";
     echo $i.".".$model_soalEach->soal;   
     echo "</div>";
     $jawaban = explode(',', $model_soalEach->pilihan_jawaban);
     echo "<div class='jawab'>";
     foreach ($jawaban as $key_j => $value_j) {         
         if($key_j == 0)
         echo "<input type='radio' name='voteSoal[$model_soalEach->id_soal]' value='$value_j' checked='checked'>&nbsp;$value_j&nbsp;&nbsp;&nbsp;";   
         else
         echo "<input type='radio' name='voteSoal[$model_soalEach->id_soal]' value='$value_j'>&nbsp;$value_j&nbsp;&nbsp;&nbsp;";         
     }
    echo "</div>";
     $i++;
 }
?>
</div>
 <div class="form-actions">		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Submit Vote',
		)); ?>		
	</div>
<?php $this->endWidget(); ?>

</div>
