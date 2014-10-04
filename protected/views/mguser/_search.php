<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<?php echo $form->textFieldRow($model,'user_name',array('class'=>'span5')); ?>	
<?php echo $form->textFieldRow($model,'NIP',array('class'=>'span5')); ?>	
<?php echo $form->textFieldRow($model,'email_address',array('class'=>'span5')); ?>	
<?php echo $form->dropDownListRow($model,'jabatan_id', $list, array(
	    'empty'=>'Semua Jabatan',
		'class'=>'span3',
		)); ?>  
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'default',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
