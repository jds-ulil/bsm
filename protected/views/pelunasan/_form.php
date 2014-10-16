<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelunasan-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'tanggal_pelunasan',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'penyebab',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'segmen',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'jenis_usaha',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'nama_nasabah',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'no_CIF',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'no_rekening',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'plafon_awal',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'OS_pokok_terakhir',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'angsuran',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'kolektibilitas_terakhir',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
