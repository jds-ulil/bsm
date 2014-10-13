<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type'=>'horizontal',
)); ?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#proposal_from_plafon,#proposal_to_plafon',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>
<div class="control-group">
    <label for="proposal_marketing" class="control-label">Nama Marketing</label>
    <div class="controls">
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model_proposal->marketing,           
            'name'=>'proposal[marketing]',
            'source'=>$this->createUrl('pegawai/autocompletePegawai'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#pegawai_nama").val(ui.item.label);           
                    return false;
                }',
                'select'=>"js:function(event, ui) { 
                    $('#proposal_marketing').val(ui.item.label);  
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',
                'placeholder'=>$model_proposal->marketing,
            ),
        ));
	?>
    </div>
    </div>
<?php echo $form->dropDownListRow($model_proposal,'segmen', $listSegmen, array(
        'empty'=>'Pilih Segmen',
            'class'=>'span3',
            )); ?>
<?php echo $form->dropDownListRow($model_proposal,'status_pengajuan', $listPengajuan, array(
        'empty'=>'Pilih Status Proposal',
            'class'=>'span3',
            )); ?>

<div class="control-group">
    <label for="proposal_marketing" class="control-label">Jenis Usaha</label>
    <div class="controls">
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model_proposal->jenis_usaha,           
            'name'=>'proposal[jenis_usaha]',
            'source'=>$this->createUrl('proposal/autocompleteUsaha'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#proposal_jenis_usaha").val(ui.item.label);                     
                    return false;
                }',
                'select'=>"js:function(event, ui) {                          
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',
                'placeholder'=>$model_proposal->jenis_usaha,
            ),
        ));
	?>
    </div>
    </div>

<div class="control-group">
    <label for="proposal_plafon" class="control-label">Plafon</label>
    <div class="controls">
        <input type="text" maxlength="50" id="proposal_from_plafon" name="proposal[from_plafon]" class="span3">
        s.d
        <input type="text" maxlength="50" id="proposal_to_plafon" name="proposal[to_plafon]" class="span3">
    </div>
    </div>
<div class="control-group">
    <label for="proposal_periode" class="control-label">Periode (Tgl)</label>
    <div class="controls">
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_proposal, //Model object
	    'attribute'=>'from_date', //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>array('dateFormat'=>'dd/mm/yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                ),
	    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
	    ));
	?>
        s.d
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_proposal, //Model object
	    'attribute'=>'to_date', //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>array('dateFormat'=>'dd/mm/yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    //'yearRange'=>'1950:2050',
                ),
	    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
	    ));?>
    </div>
    </div>
<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'danger',
                'label'=>'Buat Laporan',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
