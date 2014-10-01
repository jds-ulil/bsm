<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'type'=>'horizontal',
)); ?>

	<?php // echo $form->textFieldRow($model,'id_list_email',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'email_address',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'nama_pengguna',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->dropDownListRow($model,'jabatan_id', $list, array(
	    'empty'=>'Semua Jabatan',
		'class'=>'span5',
		)); ?>  

	 <?php echo $form->dropDownListRow($model, 'status', 
                $listNotif,
                array(
                    'empty'=>'Semua Data',
                    'class'=>'span5')
            ); ?>  

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
