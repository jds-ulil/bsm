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
<h1 class="loginHead">Data Voter</h1>
<div class='survey'>
    <div class="control-group">
        <label>Nama</label>
	<input class="span3" name="voter[nama]" id="voter_name" type="text" maxlength="50" />
    </div>
    <div class="control-group">
        <label>Jabatan</label>
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
           // 'model'=>,           
            'name'=>'voter[jabatan]',
            'source'=>$this->createUrl('jabatan/autocompleteJabatan'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $(".voter[jabatan]").val(ui.item.label);           
                    return false;
                }',
                'select'=>"js:function(event, ui) {  
                    $('#voter_jabatan').val(ui.item.label);                        
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span3',
                'style'=>'height:20px;',    
            ),
        ));
	?>
    </div>
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
