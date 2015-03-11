<?php $row_id = "dailySecurityArray-" . $key ?>
<?php $selectId = "dailySecurityArray_".$key."_jenis_nasabah"; ?>
<?php $dataSelect = isset($model->jenis_nasabah)? $model->jenis_nasabah:0; ?>
<div class='row-fluid' id="<?php echo $row_id ?>">    
    <fieldset>
            
    <legend>Input Data</legend>
    <br />
     <?php
     // save for date
        echo $form->updateTypeField($model, $key, "tanggal", array('key' => $key));
        ?>
        <div class="control-group ">
            <label class="control-label required" for="dailySecurity_jenis_nasabah">Jenis Nasabah <span class="required">*</span></label>
            <div class="controls">
                <select class="span3" name="dailySecurityArray[<?php echo $key?>][jenis_nasabah]" id="<?php echo $selectId; ?>" >
                    <option value="">Pilih Jenis Nasabah</option>
                    <option value="1" <?php echo $dataSelect==1?'selected':''?> >Nasabah Teller</option>
                    <option value="2" <?php echo $dataSelect==2?'selected':''?> >Nasabah Customer Service (CS)</option>
                    <option value="3" <?php echo $dataSelect==3?'selected':''?> >Nasabah Marketing</option>
                    <option value="4" <?php echo $dataSelect==4?'selected':''?> >Nasabah Mikro</option>
                    <option value="5" <?php echo $dataSelect==5?'selected':''?>>Nasabah Gadai</option>
                    <option value="6" <?php echo $dataSelect==6?'selected':''?>>Lain - Lain</option>
                </select>
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]jenis_nasabah"); ?>
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
            <?php echo $form->labelEx($model, "[$key]info",  array('class'=>'control-label'));?>
            <div class="controls">
                <?php echo $form->textField($model, "[$key]info", array('class'=>'span7'));?>   
                <?php echo $form->deleteRowButton($row_id, $key, 'hapus', array('class' =>'btn btn-warning')); ?>
                <?php echo $form->error($model,"[$key]info"); ?>
            </div>             
        </div>            
    </fieldset>
</div>
