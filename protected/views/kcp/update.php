<?php
$this->breadcrumbs=array(
	'Setting KCP'=>array('set'),	
	'Setting',
);

$this->menu=array(
    array('label'=>'Batal','url'=>array('set')),
);
?>

<h1 class="loginHead">Pengaturan Nama KCP</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'set-kcp-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=> 'Simpan',
		)); ?>
	</div>

<?php $this->endWidget(); ?>