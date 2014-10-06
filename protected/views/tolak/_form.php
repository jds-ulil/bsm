<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'tolak-form',
	//'enableAjaxValidation'=>true,
    'type'=>'horizontal',
)); ?>
<script language="javascript">
function menuTypeChange(menyType)
{      
    if(menyType=="Lain-lain") {
        $('#tolak_tahap_penolakan').prop('readonly',false);     
    }        
    else {
        $('#tolak_tahap_penolakan').prop('readonly',true);  
        $('#tolak_tahap_penolakan').val(''); 
    } 
}
</script>
<p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>

 <br />
    <?php echo $form->errorSummary(array($model_tolak)); ?>
    <div class="control-group">
    <?php echo $form->labelEx($model_tolak,'tanggal_tolak',array('class'=>'control-label')); ?>
    <div class="controls">
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_tolak, //Model object
	    'attribute'=>'tanggal_tolak', //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>array('dateFormat'=>'dd/mm/yy'),
	    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
	    ));
	?>
    <?php echo $form->error($model_tolak,'tanggal_tolak'); ?>
    </div>   
    </div>   
 
    <div class="control-group">
    <label for="proposal_marketing" class="control-label required">NAMA NASABAH<span class="required">*</span></label>
    <div class="controls">
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model_tolak->nama_nasabah,           
            'name'=>'tolak[nama_nasabah]',            
            'source'=>$this->createUrl('proposal/autocompleteNasabah'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#tolak_nama_nasabah").val(ui.item.label);           
                    return false;
                }',
                'select'=>"js:function(event, ui) { 
                    $('#tolak_proposal_id').val(ui.item.proposal_id);  
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',                
            ),
        ));
	?>
    <?php echo $form->error($model_tolak,'nama_nasabah'); ?>
    </div>
    </div>
    <?php echo $form->hiddenField($model_tolak, 'proposal_id'); ?>  
    <?php echo $form->textAreaRow($model_tolak,'alasan_ditolak',array('class'=>'span5', 'rows'=>2)); ?> 
    <?php echo $form->labelEx($model_tolak,'tahap_penolakan', array('class'=>'control-label')); ?>
    <div class="controls">   
    <?php echo $form->radioButtonList($model_tolak,'tahap_penolakan',$listTahapan,
                        array(
                            'onchange' => 'menuTypeChange(this.value);',                                
                            )
            ); ?>
    <?php echo $form->error($model_tolak,'tahap_penolakan'); ?>
    </div>   
    <label class="control-label" for="tolak_tahap_penolakan">&nbsp;</label>
    <div class="controls">
        <textarea id="tolak_tahap_penolakan" class="span5" name="tolak[tempLL]" <?php if(empty($model_tolak->tempLL)) echo "readonly='readonly'";?> rows="2"><?php echo $model_tolak->tempLL; ?></textarea>
    </div>
    <?php echo $form->hiddenField($model_tolak, 'mode', array('value'=>'confirm')); ?>
    <div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model_tolak->isNewRecord ? 'Konfirmasi' : 'Simpan',
		)); ?>
	</div>
<?php $this->endWidget(); ?>