<?php
// breadcrump 
$this->breadcrumbs=array(	
    "Input Data Teller"
);
?>

<?php 
// declare form value
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'id'=>'inputTeller-form',
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
                        'value'=>date("d/m/Y")                
                        )// jquery plugin options                
            ));
        ?>
        <?php echo $form->error($model,'tanggal'); ?>
        </div>    
    </div> 

<fieldset>
    <legend>Input Data</legend>
        <?php echo $form->dropDownListRow($model, 'kriteria_transaksi', $listKriteriaTransaksi, array(
                'empty'=>'Pilih Kriteria Transaksi',
                'class'=>'span3',
        )); ?>          
        <?php echo $form->textFieldRow($model,'jumlah',array('class'=>'span2','maxlength'=>50, 'onClick'=>'checkForSelect(this);')); ?>
        <?php echo $form->textFieldRow($model,'total',array('class'=>'span2','maxlength'=>50, 'onClick'=>'checkForSelect(this);')); ?>
        <?php echo $form->textFieldRow($model,'info',array('class'=>'span5','maxlength'=>50)); ?>         
</fieldset>  

  <?php    
    $formDynamic = $this->beginWidget('DDynamicTabularForm', array(
        'rowUrl' => Yii::app()->createUrl('daily/getRowTel'),
        'defaultRowView'=>'_form_teller',
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
            'element'=>'#dailyTeller_total, #dailyTellerArray_0_total',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>
