<?php $row_id = "dailyTellerArray-" . $key ?>
<?php $selectId = "dailyTellerArray_".$key."_kriteria_transaksi"; ?>
<?php $dataSelect = isset($model->kriteria_transaksi[$key])? $model->kriteria_transaksi[$key]:0; ?>
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
                    <option value="1" <?php echo $dataSelect==1?'selected':''?> >Total Transaksi</option>
                    <option value="2" <?php echo $dataSelect==2?'selected':''?> >Transaksi Setoran</option>
                    <option value="3" <?php echo $dataSelect==3?'selected':''?> >Transaksi Penarikan</option>
                    <option value="4" <?php echo $dataSelect==4?'selected':''?> >Transaksi Net Banking</option>
                    <option value="5" <?php echo $dataSelect==5?'selected':''?>>Transaksi Transfer Tunai</option>
                    <option value="6" <?php echo $dataSelect==6?'selected':''?>>Saldo Teller Akhir Hari</option>
                    <option value="7" <?php echo $dataSelect==7?'selected':''?>>Saldo Khasanah Akhir Hari</option>
                    <option value="8" <?php echo $dataSelect==8?'selected':''?>>Saldo ATM Akhir Hari</option>
                    <option value="9" <?php echo $dataSelect==9?'selected':''?>>Cross Selling</option>
                    <option value="10" <?php echo $dataSelect==10?'selected':''?>>Waktu Istirahat</option>
                    <option value="11" <?php echo $dataSelect==11?'selected':''?>>SE yang dibaca & dipahami</option>
                    <option value="12" <?php echo $dataSelect==12?'selected':''?>>Lain - Lain</option>
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
