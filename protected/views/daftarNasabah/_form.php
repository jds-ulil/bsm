<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'daftar-nasabah-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'kartukeluarga_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>40)); ?>

	<?php echo $form->textFieldRow($model,'alamat',array('class'=>'span5','maxlength'=>100)); ?>
    <?php if(!$model->isNewRecord) { ?>
    <?php echo $form->dropDownListRow($model,'status', $list, array(
      //'empty'=>'Status Nasabah',
      'class'=>'span5',
      )); ?>   
    <?php } ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
