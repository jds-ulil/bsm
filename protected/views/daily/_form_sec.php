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
                    <?php
                           foreach ($listData as $key_l => $value) {
                               if ($dataSelect == $key_l) {
                                    echo "<option value='$key_l' selected='salected'>$value</option>";
                               } else {
                                    echo "<option value='$key_l'>$value</option>";
                               }                               
                           }
                    ?>      
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
