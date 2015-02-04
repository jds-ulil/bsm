<?php $row_id = "dailyCsArray-" . $key ?>
<?php $selectId = "dailyCsArray_".$key."_kriteria_nasabah"; ?>
<?php $dataSelect = isset($model->kriteria_nasabah[$key])? $model->kriteria_nasabah[$key]:0; ?>
<div class='row-fluid' id="<?php echo $row_id ?>">    
    <fieldset>
            
    <legend>Input Data</legend>
    <br />
     <?php
     // save for date
        echo $form->updateTypeField($model, $key, "tanggal", array('key' => $key));
        ?>
        <div class="control-group ">
            <label class="control-label required" for="dailyCs_kriteria_nasabah">Kriteria Nasabah <span class="required">*</span></label>
            <div class="controls">
                <select class="span3" name="dailyCsArray[<?php echo $key?>][kriteria_nasabah]" id="<?php echo $selectId; ?>" >
                    <option value="">Pilih Kriteria Nasabah</option>
                    <option value="1" <?php echo $dataSelect==1?'selected':''?> >Tabungan BSM</option>
                    <option value="2" <?php echo $dataSelect==2?'selected':''?> >Tabungan Simpatik</option>
                    <option value="3" <?php echo $dataSelect==3?'selected':''?> >Tabungan Berencana</option>
                    <option value="4" <?php echo $dataSelect==4?'selected':''?> >Tabungan Investa Cendikia</option>
                    <option value="5" <?php echo $dataSelect==5?'selected':''?>>Tabungan Mabrur</option>
                    <option value="6" <?php echo $dataSelect==6?'selected':''?>>TabunganKu</option>
                    <option value="7" <?php echo $dataSelect==7?'selected':''?>>Giro</option>
                    <option value="8" <?php echo $dataSelect==8?'selected':''?>>Deposito</option>
                    <option value="9" <?php echo $dataSelect==9?'selected':''?>>Talangan Haji</option>
                    <option value="10" <?php echo $dataSelect==10?'selected':''?>>TabunganKu</option>
                    <option value="11" <?php echo $dataSelect==11?'selected':''?>>Giro</option>
                    <option value="12" <?php echo $dataSelect==12?'selected':''?>>BSM Mobile Banking</option>
                    <option value="13" <?php echo $dataSelect==13?'selected':''?>>BSM Net Banking</option>
                    <option value="14" <?php echo $dataSelect==14?'selected':''?>>Top-Up Nasabah Eksisting</option>
                    <option value="15" <?php echo $dataSelect==15?'selected':''?>>Follow-Up Rekening Dormant</option>
                    <option value="16" <?php echo $dataSelect==16?'selected':''?>>Follow-Up Past Due haji</option>
                    <option value="17" <?php echo $dataSelect==17?'selected':''?>>Waktu Istirahat</option>
                    <option value="18" <?php echo $dataSelect==18?'selected':''?>>SE yang dibaca & dipahami</option>
                    <option value="19" <?php echo $dataSelect==19?'selected':''?>>Lain - Lain</option>
                </select>
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]kiteria_nasabah"); ?>
                </span>
            </div>
        </div>       
    
        <div class="control-group">
            <?php echo $form->labelEx($model, "[$key]jumlah",  array('class'=>'control-label'));?>
            <div class="controls">
                <?php echo $form->textField($model, "[$key]jumlah", array('class'=>'span2', 'onClick'=>'checkForSelect(this);'));?>   
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]jumlah"); ?>
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
