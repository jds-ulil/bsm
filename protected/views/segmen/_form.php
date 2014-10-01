<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'segmen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Simpan',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
