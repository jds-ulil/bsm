<?php $row_id = "dailyTellerArray-" . $key ?>
<?php $selectId = "dailyTellerArray_".$key."_kriteria_transaksi"; ?>
<?php $dataSelect = isset($model->kriteria_transaksi)? $model->kriteria_transaksi:0; ?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#dailyTellerArray_'.$key.'_total',
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
            <label class="control-label required" for="dailyTeller_kriteria_transaksi">Kriteria Transaksi <span class="required">*</span></label>
            <div class="controls">
                <select class="span3" name="dailyTellerArray[<?php echo $key?>][kriteria_transaksi]" id="<?php echo $selectId; ?>" >
                    <option value="">Pilih Kriteria Transaksi</option>
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
                <?php echo $form->error($model,"[$key]kriteria_transaksi"); ?>
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
