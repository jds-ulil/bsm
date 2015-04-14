<?php
$this->breadcrumbs=array(
	'Clean Data',
);
?>
<h4>Data - Data Berikut Akan Di kosongkan !!!</h4>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . ' alert alert-success">' . $message . "</div>\n";
    }
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',                    
)); ?>

<?php echo $form->checkBoxRow($model,'security'); ?>
<?php echo $form->checkBoxRow($model,'customer_service'); ?>
<?php echo $form->checkBoxRow($model,'teller'); ?>
<?php echo $form->checkBoxRow($model,'back_office'); ?>
<?php echo $form->checkBoxRow($model,'warung_mikro'); ?>
<?php echo $form->checkBoxRow($model,'sales_assistan'); ?>

<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'warning',
                'label'=>'Clean',
		)); ?>
    </div>
<?php
    $this->endWidget();
?>
