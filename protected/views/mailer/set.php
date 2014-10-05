<?php
$this->breadcrumbs=array(
	'Mail Set',
);
?>
<h2 class="loginHead">Set Mail Host</h1>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mailer-form',
	'enableAjaxValidation'=>false,
        'type'=>'horizontal',
)); ?>
	
	<?php echo $form->errorSummary($model_mail); ?>

	<?php echo $form->textFieldRow($model_mail,'host',array('class'=>'span5','maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model_mail,'nama',array('class'=>'span5','maxlength'=>50)); ?>	
	<?php echo $form->passwordFieldRow($model_mail,'password',array('class'=>'span5','maxlength'=>50)); ?>
	<?php echo $form->textFieldRow($model_mail,'port',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=> 'Save',
		)); ?>
	</div>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . ' alert alert-success">' . $message . "</div>\n";
    }
?>
<?php $this->endWidget(); ?>
