<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'pelunasan-form',
	//'enableAjaxValidation'=>false,
        'type' => 'horizontal',
)); ?>


 <?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#pelunasan_plafon_awal, #pelunasan_OS_pokok_terakhir, #pelunasan_angsuran, #pelunasan_tunggakan_terakhir',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>

<script language="javascript">
function menuTypeChange(menyType)
{      
    if(menyType=="Lain-lain") {
        $('#pelunasan_penyebab').prop('readonly',false);     
    }        
    else {
        $('#pelunasan_penyebab').prop('readonly',true);  
        $('#pelunasan_penyebab').val(''); 
    } 
}
</script>

	<?php echo $form->errorSummary($model); ?>

        <div class="control-group">
            <?php echo $form->labelEx($model,'tanggal_pelunasan',array('class'=>'control-label')); ?>
            <div class="controls">
                <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'tanggal_pelunasan', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'options'=>array('dateFormat'=>'dd/mm/yy'),
                    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
                    ));
                ?>
            <?php echo $form->error($model,'tanggal_pelunasan'); ?>
            </div>
        </div>
        
	<?php echo $form->textFieldRow($model,'nama_nasabah',array('class'=>'span5','maxlength'=>100)); ?>
        <?php echo $form->textAreaRow($model,'alamat_nasabah',array('rows'=>4, 'cols'=>50, 'class'=>'span5')); ?>

        <?php echo $form->dropDownListRow($model,'segmen', $listSegmen, array(
	    'empty'=>'Pilih Segmen',
		'class'=>'span5',
		)); ?>  

                <div class="control-group">
        <?php echo $form->labelEx($model,'penyebab', array('class'=>'control-label')); ?>
        <div class="controls">   
        <?php echo $form->radioButtonList($model,'penyebab',$listSebab,
                            array(
                                'onchange' => 'menuTypeChange(this.value);',                                
                                )
                ); ?>
        <?php echo $form->error($model,'penyebab'); ?>
        </div>         
        </div>
<div class="control-group">
        <label class="control-label" for="pelunasan_penyebab">&nbsp;</label>
        <div class="controls">
            <textarea id="pelunasan_penyebab" class="span5" name="pelunasan[tempLL]" <?php if(($model->penyebab)!='Lain-lain') echo "readonly='readonly'";?> rows="2"><?php echo $model->tempLL; ?></textarea>
        </div>
</div>

        <?php echo $form->dropDownListRow($model,'jenis_pembiayaan', $listPembiayaan, array(
	    'empty'=>'Pilih Jenis Pembiayaan',
		'class'=>'span5',
		)); ?>  


	<?php echo $form->textFieldRow($model,'jenis_usaha',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php echo $form->textFieldRow($model,'no_CIF',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'no_rekening',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'plafon_awal',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'OS_pokok_terakhir',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'angsuran',array('class'=>'span5','maxlength'=>20)); ?>

         <?php echo $form->dropDownListRow($model,'kolektibilitas_terakhir', $listKolektibilitas, array(
	    'empty'=>'Pilih Kolektibilitas',
		'class'=>'span5',
		)); ?>  		

	<?php echo $form->textFieldRow($model,'margin',array('class'=>'span5','maxlength'=>6)); ?>       

	<?php echo $form->textFieldRow($model,'tunggakan_terakhir',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
