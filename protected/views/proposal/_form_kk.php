<?php $row_id = "proposalKartuKeluarga-" . $key ?>
<div class='row-fluid' id="<?php echo $row_id ?>">
Data Anggota Kartu Keluarga
 <?php    
    echo $form->updateTypeField($model, $key, "no_kartu_keluarga", array('key' => $key));
    ?>
    <div class="control-group">
        <?php echo $form->labelEx($model, "[$key]nama",  array('class'=>'control-label'));?>
        <div class="controls">
            <?php echo $form->textField($model, "[$key]nama", array('class'=>'span5'));?>   
            <?php echo $form->error($model,"[$key]nama"); ?>
        </div>             
        <?php echo $form->labelEx($model, "[$key]tanggal_lahir",  array('class'=>'control-label'));?>
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model, //Model object   
	    'attribute'=>"[$key]tanggal_lahir", //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>
                array(
                    'dateFormat'=>'yy-mm-dd',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1950:2050',
                    ),
	    'htmlOptions'=>array('class'=>'span5')// jquery plugin options                
	    ));
            ?>
        <?php echo $form->error($model,"[$key]tanggal_lahir"); ?>
            <?php //echo $form->textField($model, "[$key]tanggal_lahir", array('class'=>'span5'));?>                                    
        </div>        
        <?php echo $form->labelEx($model, "[$key]no_ktp",  array('class'=>'control-label'));?>
        <div class="controls">            
            <?php echo $form->textField($model, "[$key]no_ktp", array('class'=>'span5'));?>
            <?php echo $form->error($model, "[$key]no_ktp"); ?> 
            <?php echo $form->deleteRowButton($row_id, $key, 'hapus', array('class' =>'btn btn-warning')); ?>
        </div>                
    </div>
</div>