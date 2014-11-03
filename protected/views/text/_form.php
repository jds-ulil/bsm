<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'text-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaRow($model,'text',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

    <?php echo $form->dropDownListRow($model,'show',array('1'=>'Tampil','0'=>'Tidak Tampil'),array(
            'class'=>'span6',
            )); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
