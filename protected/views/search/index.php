<?php
$this->breadcrumbs=array(
	'Halaman Pencarian',
);
?>
<h1 class="loginHead">Kriteria Pencarian</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model_search,'search_name',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

