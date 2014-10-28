<?php
$this->breadcrumbs=array(
	'Input Watchlist',
);
?>
<div class="form">
 
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'service-form',
    'enableAjaxValidation'=>false,
    'method'=>'post',
    'type'=>'horizontal',
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
)); ?>
 
    <fieldset>
        <legend>
            <p class="note">Upload CSV file</p>
        </legend>
 
        <?php echo $form->errorSummary($model, 'Error!!!', null, array('class'=>'alert alert-error span12')); ?>
 
        <div class="control-group">     
            <div class="span4">
            <div class="control-group">
        <?php echo $form->labelEx($model,'w_file'); ?>
        <?php echo $form->fileField($model,'w_file'); ?>
        <?php echo $form->error($model,'w_file'); ?>
            </div>
 
 
            </div>
        </div>
 
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'icon'=>'ok white', 'label'=>'UPLOAD')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'remove', 'label'=>'Reset')); ?>
        </div>
 
    </fieldset>
 
<?php $this->endWidget(); ?>
 
</div><!-- form -->
