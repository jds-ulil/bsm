<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type'=>'horizontal',
)); ?>
    
    <?php echo $form->textFieldRow($model_pelunasan,'no_rekening',array('class'=>'span6')); ?>	

    <div class="control-group">
    <label for="pelunasan_nama_nasabah" class="control-label">Nama Nasabah</label>
    <div class="controls">
        <?php $status = $report?vC::APP_status_pelunasan_approv:vc::APP_status_pelunasan_new ?>
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model_pelunasan->nama_nasabah,           
            'name'=>'pelunasan[nama_nasabah]',
            'source'=>$this->createUrl('pelunasan/autocompleteNasabah&status='.$status),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#pelunasan_nama_nasabah").val(ui.item.label);                     
                    return false;
                }',
                'select'=>"js:function(event, ui) {                          
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',
                'placeholder'=>$model_pelunasan->nama_nasabah,
            ),
        ));
	?>
    </div>
    </div>

    <div class="control-group">
    <label for="pelunasan_periode" class="control-label">Periode (Tgl)</label>
    <div class="controls">
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_pelunasan, //Model object
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
	    'model'=>$model_pelunasan, //Model object
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
		<?php if($report){                   
                $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',
                'type'=>'danger',
                'label'=>'Buat Laporan',
                ));
                } else {
                    $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
                        'type'=>'Default',
                        'label'=>'Search',
                        ));
                }
                ?>
	</div>

<?php $this->endWidget(); ?>
