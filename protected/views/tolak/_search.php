<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type'=>'horizontal',
)); ?>

<div class="control-group">
    <label for="tolak_marketing_search" class="control-label">Nama Marketing</label>
    <div class="controls">
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model_tolak->marketing_search,           
            'name'=>'tolak[marketing_search]',
            'source'=>$this->createUrl('pegawai/autocompletePegawai'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#tolak_marketing_search").val(ui.item.label);           
                    return false;
                }',
                'select'=>"js:function(event, ui) { 
                    $('#tolak_ID_marketing_search').val(ui.item.label);  
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',
                'placeholder'=>$model_tolak->marketing_search,
            ),
        ));
	?>
    </div>
</div>
 <?php echo $form->dropDownListRow($model_tolak,'tahap_penolakan', $listTahapan, array(
	    'empty'=>'Pilih Tahapan',
		'class'=>'span3',
		)); ?>  
<div class="control-group">
    <label for="tolak_nama_nasabah" class="control-label">Nama Nasabah</label>
    <div class="controls">
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model_tolak->nama_nasabah,           
            'name'=>'tolak[nama_nasabah]',
            'source'=>$this->createUrl('proposal/autocompleteNasabahTolak'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#tolak_nama_nasabah").val(ui.item.label);           
                    return false;
                }',
                'select'=>"js:function(event, ui) { 
                    $('#tolak_nama_nasabah').val(ui.item.label);  
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',
                'placeholder'=>$model_tolak->nama_nasabah,
            ),
        ));
	?>
    </div>
</div>

<div class="control-group">
    <label for="tolak_periode" class="control-label">Periode (Tgl)</label>
    <div class="controls">
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_tolak, //Model object
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
	    'model'=>$model_tolak, //Model object
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
                'type'=>'default',
                'label'=>'Search',
		)); ?>
    </div>

<?php $this->endWidget(); ?>
