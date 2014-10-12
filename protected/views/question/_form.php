<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pertanyaan-form',
	'enableAjaxValidation'=>true,
        'type'=>'horizontal',
)); ?>  

	<p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

	<?php echo $form->errorSummary($model_soal); ?>

	<?php echo $form->textAreaRow($model_soal, 'soal', array('class'=>'span5', 'rows'=>5)); ?>
	<?php echo $form->textFieldRow($model_soal, 'rank', array('class'=>'span5','maxlength'=>50)); ?>
        <?php echo $form->textAreaRow($model_soal,'pilihan_jawaban',array(
                                            'hint'=>'Pilhan jawaban dipisahkan dengan tanda koma Cth: YA,TIDAK',
                                            'class'=>'span5',
                                            'rows'=>5
                                            )); ?>   

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model_soal->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>
<?php $this->endWidget(); ?>
