<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',
        'type'=>'horizontal',
)); ?>

    <div class="control-group">
    <label for="nama_voter" class="control-label">Nama Voter</label>
    <div class="controls">
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            //'model'=>$model_proposal->marketing,           
            'name'=>'voter[nama]',
            'source'=>$this->createUrl('Question/autocompleteVoter'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#voter_name").val(ui.item.label);           
                    return false;
                }',
                'select'=>"js:function(event, ui) { 
                    $('#voter_nama').val(ui.item.label);  
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span3',
                'style'=>'height:20px;',                
            ),
        ));
	?>
    </div>
    </div>

<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'danger',
                'label'=>'Submit',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
