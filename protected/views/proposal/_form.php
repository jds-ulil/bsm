<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proposal-form',
	'enableAjaxValidation'=>true,
        'type'=>'horizontal',
)); ?>
  <?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#proposal_plafon,#proposal_existing_plafon,#proposal_existing_os, #proposal_existing_angsuran, #proposal_referal_fasilitas',
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
    $('.menuType').hide();
    if(menyType!="")
        $('#'+menyType+'Div').show();
}
</script>

    <p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>
    
    <div class="control-group">        
    <?php echo $form->errorSummary(array($model_proposal,$model_ktp, $model_buku_nikah)); ?>
    <?php echo $form->textFieldRow($model_proposal,'nama_nasabah',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->labelEx($model_proposal,'tanggal_pengajuan',array('class'=>'control-label')); ?>
    <div class="controls">
	<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_proposal, //Model object
	    'attribute'=>'tanggal_pengajuan', //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>array('dateFormat'=>'dd/mm/yy'),
	    'htmlOptions'=>array('class'=>'span3')// jquery plugin options
	    ));
	?>
    <?php echo $form->error($model_proposal,'tanggal_pengajuan'); ?>
    </div>
    </div>
     <?php echo $form->dropDownListRow($model_proposal,'segmen', $listSegmen, array(
	    'empty'=>'Pilih Segmen',
		'class'=>'span3',
		)); ?>  	    	    
    <?php echo $form->textFieldRow($model_proposal,'no_proposal',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model_proposal,'plafon',array('class'=>'span5','maxlength'=>20)); ?>
    <?php echo $form->textFieldRow($model_proposal,'jenis_usaha',array('class'=>'span5','maxlength'=>50)); ?>    
    
    
<h4>Marketing</h4>   
    <?php echo $form->textFieldRow($model_marketing,'nama',
            array('class'=>'span5',
                'readonly'=>true,
                'maxlength'=>50)); ?>
    	
    
    <?php echo $form->textFieldRow($model_marketing,'NIP',
            array('class'=>'span5',
                'readonly'=>true,
                'maxlength'=>50)); ?>
    <?php if (!empty($model_marketing->jabatan)) {
        echo $form->textFieldRow($model_marketing,'jabatan',
            array('class'=>'span5',
                'readonly'=>true,
                'value'=>$model_marketing->rJab->nama_jabatan,
                'maxlength'=>50));                    
    } else {
        echo $form->textFieldRow($model_marketing,'jabatan',
            array('class'=>'span5',
                'readonly'=>true,
                'value'=>$model_marketing->jabatan,
                'maxlength'=>50));            
    } ?> 
    <?php echo $form->textFieldRow($model_marketing,'no_handphone',
            array('class'=>'span5',
                'readonly'=>true,
                'maxlength'=>50)); ?>
    
    <?php echo $form->hiddenField($model_proposal, 'marketing'); ?>
    <?php //echo $form->textFieldRow($model,'marketing',array('class'=>'span5','maxlength'=>10)); ?>
    
    
    <h4>Jenis Nasabah</h4>
    
    <?php echo $form->labelEx($model_proposal,'jenis_nasabah', array('class'=>'control-label')); ?>
    <div class="controls">
    <?php echo $form->radioButtonList($model_proposal,'jenis_nasabah',array(vC::APP_jenis_nasabah_WIC =>'Walk In Customer (WIC)', vC::APP_jenis_nasabah_existing=>'Existing', vC::APP_jenis_nasabah_refferal=>'Referal'), array('onchange' => 'menuTypeChange(this.value);')); ?>
    <?php echo $form->error($model_proposal,'jenis_nasabah'); ?>
    </div>
    
    <div id="1Div" class="row menuType">
    
    </div>
 
    <div id="2Div" class="menuType">
        <?php echo $form->textFieldRow($model_proposal,'existing_plafon',array('class'=>'span5','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model_proposal,'existing_os',array('class'=>'span5','maxlength'=>50)); ?>
        <?php echo $form->textFieldRow($model_proposal,'existing_angsuran',array('class'=>'span5','maxlength'=>50)); ?>        
        <?php echo $form->dropDownListRow($model_proposal,'existing_kolektabilitas', $listKolektabilitas, array(	    
            'empty'=>'Pilih Kolektibilitas',
            'class'=>'span3',
		)); ?>  
    </div>
 
    <div id="3Div" class="menuType">
        <?php echo $form->textFieldRow($model_proposal,'referal_nama',array('class'=>'span5','maxlength'=>50)); ?>        
        <?php echo $form->textFieldRow($model_proposal,'referal_alamat',array('class'=>'span5','maxlength'=>50)); ?>        
        <?php echo $form->textFieldRow($model_proposal,'referal_telp',array('class'=>'span5','maxlength'=>50)); ?>        
        <?php echo $form->textFieldRow($model_proposal,'referal_sektor_usaha',array('class'=>'span5','maxlength'=>50)); ?>        
        <?php echo $form->textFieldRow($model_proposal,'referal_fasilitas',array('class'=>'span5','maxlength'=>50)); ?>        
        <?php echo $form->dropDownListRow($model_proposal,'referal_kolektabilitas', $listKolektabilitas, array(	    
            'empty'=>'Pilih Kolektibilitas',
            'class'=>'span3',
		)); ?>              
    </div>
    <script language="javascript">
    menuTypeChange('<?php echo $model_proposal->jenis_nasabah;?>');
    </script>
    
    
    <h4>Identitas Nasabah</h4>
    <?php echo $form->dropDownListRow($model_proposal,'jenis_identitas', $listJenisIdentitas, array(	    
            'class'=>'span3',
            )); ?> 
    <?php echo $form->textFieldRow($model_proposal,'no_ktp',array('class'=>'span5','maxlength'=>50)); ?>            
    <?php echo $form->textFieldRow($model_ktp,'tempat_lahir',array('class'=>'span5','maxlength'=>50)); ?>            
    <?php echo $form->labelEx($model_ktp, "tanggal_lahir",  array('class'=>'control-label'));?>
    <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_ktp, //Model object   
	    'attribute'=>"tanggal_lahir", //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>
                array(
                    'dateFormat'=>'dd/mm/yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1950:2050',
                    ),
	    'htmlOptions'=>array('class'=>'span5')// jquery plugin options                
	    ));
            ?>
        <?php echo $form->error($model_ktp,'tanggal_lahir'); ?>
        </div>    
        </div>    
    <?php echo $form->textAreaRow($model_ktp,'alamat',array('class'=>'span5', 'rows'=>5)); ?>        
    <?php echo $form->textFieldRow($model_ktp,'desa',array('class'=>'span5','maxlength'=>50)); ?>                
    <?php echo $form->dropDownListRow($model_ktp,'agama', $listAgama, array(	    
		'class'=>'span3',
		)); ?>  
    <?php echo $form->textFieldRow($model_ktp,'status_perkawinan',array('class'=>'span5','maxlength'=>50)); ?>        
    <?php echo $form->textFieldRow($model_ktp,'pekerjaan',array('class'=>'span5','maxlength'=>50)); ?>        
    <?php echo $form->textFieldRow($model_ktp,'kewarganegaraan',array('class'=>'span5','maxlength'=>50)); ?>            
    <?php echo $form->labelEx($model_ktp, "masa_berlaku",  array('class'=>'control-label'));?>
     <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_ktp, //Model object   
	    'attribute'=>"masa_berlaku", //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>
                array(
                    'dateFormat'=>'dd/mm/yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1975:2050',
                    ),
	    'htmlOptions'=>array('class'=>'span5')// jquery plugin options                
	    ));
            ?>
        <?php echo $form->error($model_ktp,'masa_berlaku'); ?>
        </div>
        </div>
    <h4>Buku Nikah</h4>
    <?php echo $form->textFieldRow($model_proposal,'no_buku_nikah',array('class'=>'span5','maxlength'=>50)); ?>        
    <div class="control-group">
    <?php echo $form->labelEx($model_buku_nikah, "tgl_buku_nikah",  array('class'=>'control-label'));?>
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_buku_nikah, //Model object   
	    'attribute'=>"tgl_buku_nikah", //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>
                array(
                    'dateFormat'=>'dd/mm/yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1950:2050',
                    ),
	    'htmlOptions'=>array('class'=>'span5')// jquery plugin options                
	    ));
            ?>
        <?php echo $form->error($model_buku_nikah,'tgl_buku_nikah'); ?>
        </div>
        </div>
    <h4>Kartu Keluarga</h4>
    <?php echo $form->textFieldRow($model_proposal,'no_kartu_keluarga',array('class'=>'span5','maxlength'=>50)); ?>        
    <?php echo $form->labelEx($model_proposal, "tanggal_kartu_keluarga",  array('class'=>'control-label'));?>
     <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model_proposal, //Model object   
	    'attribute'=>"tanggal_kartu_keluarga", //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>
                array(
                    'dateFormat'=>'dd/mm/yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1975:2050',
                    ),
	    'htmlOptions'=>array('class'=>'span5')// jquery plugin options                
	    ));
            ?>
        <?php echo $form->error($model_proposal,'tanggal_kartu_keluarga'); ?>
        </div>
        </div>
    <?php
    $formDynamic = $this->beginWidget('DynamicTabularForm', array(
        'defaultRowView'=>'_form_kk',
    ));
    echo $formDynamic->rowForm($model_kartu_keluarga); 
    
    ?>
    <?php echo $form->hiddenField($model_proposal, 'mode', array('value'=>'confirm')); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'label'=>$model_proposal->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
	</div>
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>
