<?php $row_id = "dailyWmArray-" . $key ?>
<?php $selectId = "dailyWmArray_".$key."_kriteria_nasabah"; ?>
<?php $dataSelect = isset($model->kriteria_nasabah)? $model->kriteria_nasabah:0; ?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#dailyWmArray_'.$key.'_total',
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
            <label class="control-label required" for="dailyWm_kriteria_nasabah">Kriteria Nasabah <span class="required">*</span></label>
            <div class="controls">
                <select class="span4" name="dailyWmArray[<?php echo $key?>][kriteria_nasabah]" id="<?php echo $selectId; ?>" >
                    <option value="">Pilih Kriteria Nasabah</option>
                    <option value="1" <?php echo $dataSelect==1?'selected':''?>>Tahap - Sosialisasi</option>
                    <option value="2" <?php echo $dataSelect==2?'selected':''?>>Tahap - Solisit</option>
                    <option value="3" <?php echo $dataSelect==3?'selected':''?>>Tahap - Pengumpulan Data</option>
                    <option value="4" <?php echo $dataSelect==4?'selected':''?>>Tahap - BI Checking</option>
                    <option value="5" <?php echo $dataSelect==5?'selected':''?>>Tahap - Taksasi Agunan</option>
                    <option value="6" <?php echo $dataSelect==6?'selected':''?>>Tahap - Investigasi</option>
                    <option value="7" <?php echo $dataSelect==7?'selected':''?>>Tahap - Analisa</option>
                    <option value="8" <?php echo $dataSelect==8?'selected':''?>>Tahap - SP3</option>
                    <option value="9" <?php echo $dataSelect==9?'selected':''?>>Tahap - Akad</option>
                    <option value="10" <?php echo $dataSelect==10?'selected':''?>>Tahap - Pencairan</option>
                    <option value="11" <?php echo $dataSelect==11?'selected':''?>>Pick-up Angsuran Nasabah</option>
                    <option value="12" <?php echo $dataSelect==12?'selected':''?>>Tagih Past Due Bulan Sebelumnya</option>
                    <option value="13" <?php echo $dataSelect==13?'selected':''?>>Peringatan Nasabah - SPMK</option>
                    <option value="14" <?php echo $dataSelect==14?'selected':''?>>Peringatan Nasabah - SP1</option>
                    <option value="15" <?php echo $dataSelect==15?'selected':''?>>Peringatan Nasabah - SP2</option>
                    <option value="16" <?php echo $dataSelect==16?'selected':''?>>Peringatan Nasabah - SP3</option>
                    <option value="17" <?php echo $dataSelect==17?'selected':''?>>Funding - Sosialisasi</option>
                    <option value="18" <?php echo $dataSelect==18?'selected':''?>>Funding - Solisit</option>
                    <option value="19" <?php echo $dataSelect==19?'selected':''?>>Funding - Follow Up</option>
                    <option value="20" <?php echo $dataSelect==20?'selected':''?>>Funding - Closing</option>
                    <option value="21" <?php echo $dataSelect==21?'selected':''?>>Pick-up Tabungan Nasabah</option>
                    <option value="22" <?php echo $dataSelect==22?'selected':''?>>SE yang dibaca & dipahami</option>
                    <option value="23" <?php echo $dataSelect==23?'selected':''?>>Waktu Istirahat</option>
                    <option value="24" <?php echo $dataSelect==24?'selected':''?>>Lain - Lain</option>
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
