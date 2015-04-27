<?php
// breadcrump 
$this->breadcrumbs=array(	
    "Input Data Back Office"
);
?>

<?php 
// declare form value
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'inputCS-form',
	//'enableAjaxValidation'=>true,
    'type'=>'horizontal',
)); ?>      
<?php echo $form->textFieldRow($model,'nama_pegawai',array('class'=>'span5','maxlength'=>50)); ?>

<?php echo $form->labelEx($model, "tanggal",  array('class'=>'control-label'));?>
    <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object   
            'attribute'=>"tanggal", //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>
                    array(
                        'dateFormat'=>'dd/mm/yy',                      
                        ),
            'htmlOptions'=>array(
                        'class'=>'span2',                               
                        'value'=>  empty($model->tanggal)?date("d/m/Y"):$model->tanggal,                 
                        )// jquery plugin options                
            ));
        ?>
        <?php echo $form->error($model,'tanggal'); ?>
        </div>    
    </div> 

    <div class="control-group ">
        <label class="control-label" for="dailyCs_waktu_istrahat">Waktu Istirahat</label>
            <div class="controls">                            
                <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object   
                    'attribute'=>"start_rest", //attribute name
                    'mode'=>'time', //use "time","date" or "datetime" (default)
                    'options'=>
                        array(
                            'dateFormat'=>'dd/mm/yy',                      
                                ),
                    'htmlOptions'=>array(
                            'class'=>'span1',                               
                            'value'=> empty($model->start_rest)?'':$model->start_rest,                
                            )// jquery plugin options                
                        ));
                ?>
                &nbsp;sd&nbsp;
                <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                        $this->widget('CJuiDateTimePicker',array(
                        'model'=>$model, //Model object   
                        'attribute'=>"end_rest", //attribute name
                        'mode'=>'time', //use "time","date" or "datetime" (default)
                        'options'=>
                            array(
                                'dateFormat'=>'dd/mm/yy',                      
                                ),
                        'htmlOptions'=>array(
                            'class'=>'span1',                               
                            'value'=> empty($model->end_rest)?'':$model->end_rest,                
                                )// jquery plugin options                
                    ));
                ?>
                <span class="help-inline error">
                    <?php echo $form->error($model,"start_rest"); ?>
                </span>
            </div>
            
        </div>      
<?php echo $form->textFieldRow($model,'se_read',array('class'=>'span5','maxlength'=>50)); ?> 

<fieldset>
    <legend>Input Data</legend>
        <?php echo $form->dropDownListRow($model, 'kriteria_transaksi', $listKriteriaTransaksi, array(
                'empty'=>'Pilih Kriteria Transaksi',
                'class'=>'span3',
        )); ?>                  
        <?php echo $form->dropDownListRow($model, 'status_transaksi', $listProgress, array(
                'empty'=>'Pilih Status Transaksi',
                'class'=>'span3',
        )); ?> 
        <?php echo $form->textFieldRow($model,'jumlah_transaksi',array('class'=>'span2','maxlength'=>50, 'onClick'=>'checkForSelect(this);')); ?>
        <?php echo $form->textFieldRow($model,'total',array('class'=>'span2','maxlength'=>50, 'onClick'=>'checkForSelect(this);')); ?>
        <?php echo $form->textFieldRow($model,'info',array('class'=>'span5','maxlength'=>50)); ?>         
</fieldset>  

  <?php
    $formDynamic = $this->beginWidget('DDynamicTabularForm', array(
        'rowUrl' => Yii::app()->createUrl('daily/getRowBo'),
        'defaultRowView'=>'_form_bo',
        'title' => 'Input data kriteria transaksi lainnya',
    ));
    echo $formDynamic->rowForm($model_, $listKriteriaTransaksi); 
    
    ?>
   

    <div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'success',
                'label'=>'Simpan',
		)); ?>
    </div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>

<script>
    var checkForSelect = function(el) {                    
            var val = $(el).val();
            if (val == 0)
                $(el).select();     
    };
</script>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#dailyBo_total, #dailyBoArray_0_total',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>
