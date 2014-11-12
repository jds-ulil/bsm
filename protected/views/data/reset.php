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

<?php echo $form->checkBoxRow($model,'proposal'); ?>
<?php echo $form->checkBoxRow($model,'pelunasan'); ?>
<?php echo $form->checkBoxRow($model,'watchlist'); ?>
<?php echo $form->checkBoxRow($model,'kuisioner'); ?>

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
