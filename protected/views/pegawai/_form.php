<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pegawai-form',
	'enableAjaxValidation'=>false,
        'type'=>'horizontal',
)); ?>

	<p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>
    <br />
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'no_urut',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'NIP',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'no_handphone',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>50)); ?>
    
    <?php echo $form->textFieldRow($model,'email_atasan',array('class'=>'span5','maxlength'=>50)); ?>

    <?php echo $form->dropDownListRow($model,'unit_kerja', $listUnit, array(
	    'empty'=>'Pilih Unit Kerja',
		'class'=>'span5',
		)); ?>
    
    <?php echo $form->dropDownListRow($model,'jabatan', $list, array(
	    'empty'=>'Pilih Jabatan',
		'class'=>'span5',
		)); ?>     	

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
