<?php
// breadcrump 
$this->breadcrumbs=array(	
    "Input Data Security"
);
?>


<?php 
// declare form value
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'proposal-form',
	'enableAjaxValidation'=>true,
    'type'=>'horizontal',
)); ?>            
        <?php echo $form->textFieldRow($model,'nama_inputer',array('class'=>'span2','maxlength'=>50)); ?>

        <?php echo $form->labelEx($model, "tanggal",  array('class'=>'control-label'));?>
        <div class="control-group">
            <div class="controls">            
            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object   
            'attribute'=>"tanggal", //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>
                    array(
                        'dateFormat'=>'dd/mm/yy',
                        //'changeMonth'=>true,
                        //'changeYear'=>true,
                        //'yearRange'=>'2010:2050',
                        ),
            'htmlOptions'=>array('class'=>'span2')// jquery plugin options                
            ));
                ?>
            <?php echo $form->error($model,'tanggal'); ?>
            </div>    
        </div>   

    <fieldset>
        <legend>Nasabah Teler</legend>
        <?php echo $form->textFieldRow($model,'teler_jumlah',array('class'=>'span2','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model,'teler_info',array('class'=>'span5','maxlength'=>50)); ?>
    </fieldset>
    <fieldset>
        <legend>Nasabah <i>Customer Service</i></legend>
        <?php echo $form->textFieldRow($model,'cs_jumlah',array('class'=>'span2','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model,'cs_info',array('class'=>'span5','maxlength'=>50)); ?>
    </fieldset>
    <fieldset>
        <legend>Nasabah Marketing</legend>
        <?php echo $form->textFieldRow($model,'marketing_jumlah',array('class'=>'span2','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model,'marketing_info',array('class'=>'span5','maxlength'=>50)); ?>
    </fieldset>
    <fieldset>
        <legend>Nasabah Mikro</legend>
        <?php echo $form->textFieldRow($model,'mikro_jumlah',array('class'=>'span2','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model,'mikro_info',array('class'=>'span5','maxlength'=>50)); ?>
    </fieldset>
    <fieldset>
        <legend>Nasabah Gadai</legend>
        <?php echo $form->textFieldRow($model,'gadai_jumlah',array('class'=>'span2','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model,'gadai_info',array('class'=>'span5','maxlength'=>50)); ?>
    </fieldset>
    <fieldset>
        <legend>Lain - lain </legend>
        <?php echo $form->textFieldRow($model,'lain_jumlah',array('class'=>'span2','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model,'lain_info',array('class'=>'span5','maxlength'=>50)); ?>
    </fieldset>

    <div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'success',
                'label'=>'Simpan',
		)); ?>
    </div>
<?php $this->endWidget(); ?>
