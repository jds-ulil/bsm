<?php $row_id = "dailySaArray-" . $key ?>
<?php $selectId = "dailySaArray_".$key."_kriteria_nasabah"; ?>
<?php $dataSelect = isset($model->kriteria_nasabah)? $model->kriteria_nasabah:0; ?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#dailySaArray_'.$key.'_total',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>
<div class='row-fluid' id="<?php echo $row_id ?>">        
    <fieldset>
            
    <legend>Input Data</legend>
    <br />
     <?php
     // save for date
        echo $form->updateTypeField($model, $key, "tanggal", array('key' => $key));
        ?>
        <div class="control-group ">
            <label class="control-label required" for="dailySa_kriteria_nasabah">Kriteria Nasabah <span class="required">*</span></label>
            <div class="controls">
                <select class="span4" name="dailySaArray[<?php echo $key?>][kriteria_nasabah]" id="<?php echo $selectId; ?>" >
                    <option value="">Pilih Kriteria Nasabah</option>
                    <option value="1" <?php echo $dataSelect==1?'selected':''?> >Lending - Sosialisasi</option>
                    <option value="2" <?php echo $dataSelect==2?'selected':''?> >Lending - Solisit</option>
                    <option value="3" <?php echo $dataSelect==3?'selected':''?> >Lending - Pengumpulan Data</option>
                    <option value="4" <?php echo $dataSelect==4?'selected':''?> >Lending - BI Checking</option>
                    <option value="5" <?php echo $dataSelect==5?'selected':''?>>Lending - Taksasi Agunan</option>
                    <option value="6" <?php echo $dataSelect==6?'selected':''?>>Lending - Investigasi</option>
                    <option value="7" <?php echo $dataSelect==7?'selected':''?>>Lending - Analisa</option>
                    <option value="8" <?php echo $dataSelect==8?'selected':''?>>Lending - SP3</option>
                    <option value="9" <?php echo $dataSelect==9?'selected':''?>>Lending - Akad</option>
                    <option value="10" <?php echo $dataSelect==10?'selected':''?>>Lending - Pencairan</option>
                    <option value="11" <?php echo $dataSelect==11?'selected':''?>>Perpanjangan - Pengumpulan Data</option>
                    <option value="12" <?php echo $dataSelect==12?'selected':''?>>Perpanjangan - BI Checking</option>
                    <option value="13" <?php echo $dataSelect==13?'selected':''?>>Perpanjangan - Taksasi Agunan</option>
                    <option value="14" <?php echo $dataSelect==14?'selected':''?>>Perpanjangan - Investigasi</option>
                    <option value="15" <?php echo $dataSelect==15?'selected':''?>>Perpanjangan - Analisa</option>
                    <option value="16" <?php echo $dataSelect==16?'selected':''?>>Perpanjangan - SP3</option>
                    <option value="17" <?php echo $dataSelect==17?'selected':''?>>Perpanjangan - Akad</option>
                    <option value="18" <?php echo $dataSelect==18?'selected':''?>>Perpanjangan - Eksekusi Perpanjangan</option>
                    <option value="19" <?php echo $dataSelect==19?'selected':''?>>Pick-up Angsuran Nasabah</option>
                    <option value="20" <?php echo $dataSelect==20?'selected':''?>>Tagih Past Due Bulan Sebelumnya</option>
                    <option value="21" <?php echo $dataSelect==21?'selected':''?>>Peringatan Nasabah - SPMK</option>
                    <option value="22" <?php echo $dataSelect==22?'selected':''?>>Peringatan Nasabah - SP1</option>
                    <option value="23" <?php echo $dataSelect==23?'selected':''?>>Peringatan Nasabah - SP2</option>
                    <option value="24" <?php echo $dataSelect==24?'selected':''?>>Peringatan Nasabah - SP3</option>
                    <option value="25" <?php echo $dataSelect==25?'selected':''?>>Funding - Sosialisasi</option>                    
                    <option value="26" <?php echo $dataSelect==26?'selected':''?>>Funding - Solisit</option>
                    <option value="27" <?php echo $dataSelect==27?'selected':''?>>Funding - Follow Up</option>
                    <option value="28" <?php echo $dataSelect==28?'selected':''?>>Funding - Closing</option>
                    <option value="29" <?php echo $dataSelect==29?'selected':''?>>Pick-up Tabungan Nasabah</option>
                    <option value="30" <?php echo $dataSelect==30?'selected':''?>>SE yang dibaca & dipahami</option>
                    <option value="31" <?php echo $dataSelect==31?'selected':''?>>Waktu Istirahat</option>
                    <option value="32" <?php echo $dataSelect==32?'selected':''?>>Lain - Lain</option>
                </select>
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]kriteria_nasabah"); ?>
                </span>
            </div>
        </div>       
    
        <div class="control-group">
            <?php echo $form->labelEx($model, "[$key]jumlah_nasabah",  array('class'=>'control-label'));?>
            <div class="controls">
                <?php echo $form->textField($model, "[$key]jumlah_nasabah", array('class'=>'span2', 'onClick'=>'checkForSelect(this);'));?>   
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]jumlah_nasabah"); ?>
                </span>
            </div>      
        </div>
        <div class="control-group">
            <?php echo $form->labelEx($model, "[$key]total",  array('class'=>'control-label'));?>
            <div class="controls">
                <?php echo $form->textField($model, "[$key]total", array('class'=>'span7'));?>                   
                <?php echo $form->error($model,"[$key]total"); ?>
            </div>             
        </div>            
        <div class="control-group">
            <?php echo $form->labelEx($model, "[$key]info",  array('class'=>'control-label'));?>
            <div class="controls">
                <?php echo $form->textField($model, "[$key]info", array('class'=>'span7'));?>   
                <?php echo $form->deleteRowButton($row_id, $key, 'hapus', array('class' =>'btn btn-warning')); ?>
                <?php echo $form->error($model,"[$key]info"); ?>
            </div>             
        </div>            
    </fieldset>
</div>
