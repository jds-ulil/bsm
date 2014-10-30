<?php
$this->breadcrumbs=array(
	'Input Watchlist',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){		
    $('#mtb-proposal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<div class="form">
 
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'service-form',
    'enableAjaxValidation'=>false,
    'method'=>'post',
    'type'=>'horizontal',
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data'
    )
)); ?>
 
    <fieldset>
        <legend>
            <p class="note">Upload CSV file</p>
        </legend>
 
        <?php echo $form->errorSummary($model, 'Error!!!', null, array('class'=>'alert alert-error span12')); ?>
        
        <div class="control-group">
        <?php echo $form->labelEx($model,'tgl_upload',array('class'=>'control-label')); ?>
        <div class="controls">
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'tgl_upload', //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>array('dateFormat'=>'dd/mm/yy'),
            'htmlOptions'=>array('class'=>'span3',
                                'value'=>date("d/m/Y")
                )// jquery plugin options
            ));
        ?>
        <?php echo $form->error($model,'tgl_upload'); ?>
        </div>
        </div>
        
        <div class="control-group">     
            &nbsp;
            <div class="controls">
        <?php echo $form->labelEx($model,'w_file'); ?>
        <?php echo $form->fileField($model,'w_file'); ?>
        <?php echo $form->error($model,'w_file'); ?>
            </div> 
        </div>
 
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'success', 'icon'=>'ok white', 'label'=>'UPLOAD')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'icon'=>'remove', 'label'=>'Reset')); ?>
        </div>
 
    </fieldset>
 
<?php $this->endWidget(); ?>
 
<div class="row">
    <div class="span6 offset1">   
 <?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model_search->search_input(),	
    'type'=>'bordered striped',
	'columns'=>array(
         array(
            'header'=>'No',
            'value'=>'$row+1',
            'htmlOptions' => array('width' => 30),
        ),
        array(
            'name'=>'Tanggal Upload',
            'value'=>'Yii::app()->numberFormatter->formatDate($data->tgl_upload)',
            ),
        array(
        'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}{delete}",
            'updateButtonLabel' => "Edit",
            'deleteButtonLabel' => "Hapus",
            'updateButtonUrl'=>'Yii::app()->createUrl("/watch/updateByDate", array("date" =>$data[\'tgl_upload\']))',
            'deleteButtonUrl'=>'Yii::app()->createUrl("/watch/deleteByDate", array("date" =>$data[\'tgl_upload\']))',
			'htmlOptions' => 
            array (
			  //  'width' => '6%',
			  //  'align' => 'center',
                ),
            ),        
	),
)); ?>   
    </div>
</div>
    
    
</div><!-- form -->
