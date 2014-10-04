<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */
/* @var $form CActiveForm */
?>
<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mtb-user-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        ),
)); ?>

	<p class="note">Input dengan tanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->textFieldRow($model,'user_name',array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model,'NIP',array('class'=>'span3')); ?>
<?php if ($model->isNewRecord) {    ?>
          <?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3')); ?>
            <?php echo $form->passwordFieldRow($model,'confirmPass',array('class'=>'span3')); ?>    
<?php    } //if new record ?>
    <?php echo $form->textFieldRow($model,'email_address',array('class'=>'span3')); ?>
    <?php echo $form->dropDownListRow($model,'jabatan_id', $list, array(
	    'empty'=>'Pilih Jabatan',
		'class'=>'span3',
		)); ?>       

    <div class="form-actions">		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Save',
		)); ?>		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->