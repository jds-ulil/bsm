<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'list-email-form',
	'enableAjaxValidation'=>false,    
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Kolom dengan tanda <span class="required">*</span> wajib diisi.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'email_address',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'NIP',array('class'=>'span5','maxlength'=>50)); ?>
        
	<?php echo $form->textFieldRow($model,'nama_pengguna',array('class'=>'span5','maxlength'=>50)); ?>

    <?php echo $form->dropDownListRow($model, 'jabatan_id', $list,
            array (
                'empty'=>'Pilih',
                'class'=>'span5',
                )
            ); ?>    
    
    <?php echo $form->dropDownListRow($model, 'status', 
                $listNotif,
                array(
                    'empty'=>'Pilih Notif Email',
                    'class'=>'span6'
                    )
            ); ?>    

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
