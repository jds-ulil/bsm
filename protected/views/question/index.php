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
<!--<h1 class="loginHead">Data Voter</h1>-->
   <?php 
   /**
   echo $form->textFieldRow($model_marketing,'nama',
            array('class'=>'span5',
                'readonly'=>true,
                'maxlength'=>50)); 
    * 
    */   
   ?>
    	
    
    <?php 
    /**
    echo $form->textFieldRow($model_marketing,'NIP',
            array('class'=>'span5',
                'readonly'=>true,
                'maxlength'=>50)); 
     * 
     */
    ?>
<div class='head-survey'>Quistionaire</div>
<div class='soal_jawab'>
<?php
 $i = 1;
 foreach ($model_soal as $key => $model_soalEach) {  
     echo "<div class='row rowQ'>";
     echo "<div class='span6 soal'>";
     echo $i.".".$model_soalEach->soal;   
     echo "</div>";
     $jawaban = explode(',', $model_soalEach->pilihan_jawaban);
     echo "<div class='span2'>";
     
//     if(isset($arrJwb[$model_soalEach->id_soal])) { 
//         foreach ($jawaban as $key_j => $value_j) {         
//            if($value_j == $arrJwb[$model_soalEach->id_soal])             
//            echo "<input type='radio' name='voteSoal[$model_soalEach->id_soal]' value='$value_j' checked='checked'>&nbsp;$value_j&nbsp;&nbsp;&nbsp;";   
//            else
//            echo "<input type='radio' name='voteSoal[$model_soalEach->id_soal]' value='$value_j'>&nbsp;$value_j&nbsp;&nbsp;&nbsp;";         
//        }         
//     } else {     
//        foreach ($jawaban as $key_j => $value_j) {         
//            if($key_j == 0)             
//            echo "<input type='radio' name='voteSoal[$model_soalEach->id_soal]' value='$value_j' checked='checked'>&nbsp;$value_j&nbsp;&nbsp;&nbsp;";   
//            else
//            echo "<input type='radio' name='voteSoal[$model_soalEach->id_soal]' value='$value_j'>&nbsp;$value_j&nbsp;&nbsp;&nbsp;";         
//        }
     ?>
    <?php  echo "<select class='span2' name='voteSoal[$model_soalEach->id_soal]'>"; ?>
    <?php
        foreach ($jawaban as $key_j => $value_j) {                  
            echo "<option value='$value_j'>$value_j</option>";
        }
        ?>
    <?php echo "</select>"; ?>
    <?php
//     }
    echo "</div>";
     $i++;
    echo "</div>";//end div row soal jawab
 }
?>
</div>
 <div class="form-actions">		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Simpan',
		)); ?>		
	</div>
<?php $this->endWidget(); ?>

</div>
