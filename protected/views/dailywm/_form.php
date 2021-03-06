<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'kolektabilitas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model,'rank',array('class'=>'span5','maxlength'=>2)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Simpan',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
