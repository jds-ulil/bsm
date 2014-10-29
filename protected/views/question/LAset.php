<?php
$this->breadcrumbs=array(
	'Setting Logout Alert'
);

$this->menu=array(
	array('label'=>'Daftar Pertanyaan','url'=>array('pertanyaan')),	
    array('label'=>'Pertanyaan Baru','url'=>array('create')),
);

?>

<h2 class="loginHead">Set Login Alert</h1>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mailer-form',
	'enableAjaxValidation'=>false,
        'type'=>'horizontal',
)); ?>
<?php echo $form->checkBoxRow($model, 'alert_status'); ?>
<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=> 'Save',
		)); ?>
	</div>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . ' alert alert-success">' . $message . "</div>\n";
    }
?>
<?php $this->endWidget(); ?>

