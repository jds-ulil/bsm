<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'naspoma-form',
	'enableAjaxValidation'=>true,
    'type'=>'horizontal',
)); ?>

<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#naspoma_plafon_awal,#naspoma_OS_pokok_terakhir,#naspoma_angs_per_hasil,#naspoma_tunggakan',
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
function stP(st)
{      
    if(st=="Kawin") { 
        $('#naspoma_tgl_buku_nikah').prop('readonly',false);     
        $('#naspoma_no_buku_nikah').prop('readonly',false);        
    } else {
             $('#naspoma_tgl_buku_nikah').prop('readonly',true);     
            $('#naspoma_no_buku_nikah').prop('readonly',true);     
            $('#naspoma_tgl_buku_nikah').val(''); 
            $('#naspoma_no_buku_nikah').val(''); 
        }
}
</script>

<p class="help-block">Kolom dengan tanda <span class="required">*</span> harus diisi.</p>
    <?php echo $form->errorSummary(array($model)); ?>
    <?php echo $form->textFieldRow($model,'nama',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->dropDownListRow($model,'segmen', $listSegmen, array(
	    'empty'=>'Pilih Segmen',
		'class'=>'span3',
        )); ?>
    <?php echo $form->textAreaRow($model,'alasan',array('class'=>'span5', 'rows'=>2)); ?>   

<h4>Data Pembiayaan</h4>
    <?php echo $form->dropDownListRow($model,'jenis_pembiayaan', $listPembiayaan, array(
            'empty'=>'Pilih Jenis Pembiayaan',
            'class'=>'span5',
            )); ?> 

    <?php echo $form->textFieldRow($model,'jenis_usaha',array('class'=>'span5','maxlength'=>50)); ?>
	
	<?php echo $form->textFieldRow($model,'no_CIF',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'no_rekening',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'plafon_awal',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'OS_pokok_terakhir',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'angs_per_hasil',array('class'=>'span5','maxlength'=>20)); ?>

    <?php echo $form->dropDownListRow($model,'kolektibilitas_terakhir', $listKolektibilitas, array(	    
            'empty'=>'Pilih Kolektibilitas',
            'class'=>'span3',
		)); ?>

    <?php echo $form->textFieldRow($model,'margin',array('class'=>'span5','maxlength'=>6)); ?> 

    <?php echo $form->textFieldRow($model,'tunggakan',array('class'=>'span5','maxlength'=>20)); ?>

<h4>Identitas Nasabah</h4>
    <?php echo $form->dropDownListRow($model, 'jenis_identitas', $listJenisIdentitas, array(	    
            'class'=>'span3',
            )); ?> 

    <?php echo $form->textFieldRow($model, 'no_identitas', array('class'=>'span5','maxlength'=>50)); ?>  

    <?php echo $form->textFieldRow($model, 'tempat_lahir', array('class'=>'span5','maxlength'=>50)); ?>            

    <?php echo $form->labelEx($model, "tanggal_lahir",  array('class'=>'control-label'));?>
    <div class="control-group">
        <div class="controls">            
            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                'model'=>$model, //Model object   
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
        <?php echo $form->error($model,'tanggal_lahir'); ?>
        </div>    
    </div>  

    <?php echo $form->textAreaRow($model,'alamat',array('class'=>'span5', 'rows'=>5)); ?>  
    <?php echo $form->textAreaRow($model,'desa',array('class'=>'span5', 'rows'=>5)); ?>  

    <?php echo $form->dropDownListRow($model,'agama', $listAgama, array(	    
        'class'=>'span3',
		)); ?>

    <?php echo $form->dropDownListRow($model, 'status_perkawinan', 
            array(
                'Kawin' => "Kawin",
                'Tidak Kawin' => "Tidak Kawin",
            )
            , array(
      'empty'=>'Pilih Status Pernikahan',
      'class'=>'span3',
      'onchange'=>'stP(this.value)'
      )); ?>


    <?php echo $form->textFieldRow($model, 'pekerjaan', array('class'=>'span5','maxlength'=>50)); ?>        
    <?php echo $form->textFieldRow($model, 'kewarganegaraan', array('class'=>'span5','maxlength'=>50)); ?>            
    <?php echo $form->labelEx($model, "masa_berlaku",  array('class'=>'control-label'));?>
     <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model, //Model object   
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
        <?php echo $form->error($model,'masa_berlaku'); ?>
        </div>
        </div>


    <h4>Buku Nikah</h4>
    <?php echo $form->textFieldRow($model,'no_buku_nikah',array('class'=>'span5','maxlength'=>50)); ?>        
    <div class="control-group">
    <?php echo $form->labelEx($model, "tgl_buku_nikah",  array('class'=>'control-label'));?>
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model, //Model object   
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
        <?php echo $form->error($model,'tgl_buku_nikah'); ?>
        </div>
        </div>


    <h4>Kartu Keluarga</h4>
    <?php echo $form->textFieldRow($model,'no_kartu_keluarga',array('class'=>'span5','maxlength'=>50)); ?>        
    <?php echo $form->labelEx($model, "tanggal_kartu_keluarga",  array('class'=>'control-label'));?>
     <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model, //Model object   
	    'attribute'=>"tgl_kartu_keluarga", //attribute name
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
        <?php echo $form->error($model,'tgl_kartu_keluarga'); ?>
        </div>
        </div>
    <br />
    <?php
    $formDynamic = $this->beginWidget('DynamicTabularForm', array(
        'defaultRowView'=>'_form_kk',
    ));
    echo $formDynamic->rowForm($model_kartu_keluarga);     
    ?>
    

<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'danger',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Simpan',
		)); ?>
	</div>    
<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>

