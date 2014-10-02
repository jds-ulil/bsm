<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type'=>'horizontal',
)); ?>

 <?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#proposal_from_plafon,#proposal_to_plafon,#proposal_existing_os, #proposal_existing_angsuran, #proposal_referal_fasilitas',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>

<?php echo $form->textFieldRow($model_proposal,'no_proposal',array('class'=>'span5')); ?>
<?php echo $form->textFieldRow($model_proposal,'marketing',array('class'=>'span5')); ?>
<h3>Tanggal Pengajuan</h3>

<div class="control-group">
    <?php echo $form->labelEx($model_proposal,'from_date',array('class'=>'control-label')); ?>
    <div class="controls">
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_proposal, //Model object
	    'attribute'=>'from_date', //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>array('dateFormat'=>'yy-mm-dd',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                ),
	    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
	    ));
	?>
    </div>
    </div>
<div class="control-group">
    <?php echo $form->labelEx($model_proposal,'to_date',array('class'=>'control-label')); ?>
    <div class="controls">
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_proposal, //Model object
	    'attribute'=>'to_date', //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>array('dateFormat'=>'yy-mm-dd',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    //'yearRange'=>'1950:2050',
                ),
	    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
	    ));
	?>
    </div>
    </div>

<h3>Plafon Pengajuan</h3>
    <?php echo $form->textFieldRow($model_proposal,'from_plafon',array('class'=>'span3')); ?>
    <?php echo $form->textFieldRow($model_proposal,'to_plafon',array('class'=>'span3')); ?>
    <?php echo $form->hiddenField($model_proposal,'proposal_id', array('value'=>'')); ?>
<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'default',
                'label'=>'Search',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
