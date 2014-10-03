<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type'=>'horizontal',
)); ?>
<div class="control-group">
    <?php echo $form->labelEx($model_tolak,'tanggal_tolak',array('class'=>'control-label')); ?>
    <div class="controls">
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_tolak, //Model object
	    'attribute'=>'tanggal_tolak', //attribute name
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
<?php echo $form->dropDownListRow($model_tolak,'tahap_penolakan', $listTahapan, array(
	    'empty'=>'Semua',
		'class'=>'span3',
		)); ?>  
<?php echo $form->textFieldRow($model_tolak,'marketing_search',array('class'=>'span5')); ?>
<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'default',
                'label'=>'Search',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
