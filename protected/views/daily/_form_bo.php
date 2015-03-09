<?php $row_id = "dailyBoArray-" . $key ?>
<?php $selectId = "dailyBoArray_".$key."_kriteria_transaksi"; ?>
<?php $dataSelect = isset($model->kriteria_transaksi[$key])? $model->kriteria_transaksi[$key]:0; ?>

<?php $selectId2 = "dailyBoArray_".$key."_status_transaksi"; ?>
<?php $dataSelect2 = isset($model->status_transaksi[$key])? $model->status_transaksi[$key]:0; ?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#dailyBoArray_'.$key.'_total',
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
            <label class="control-label required" for="dailyBo_kriteria_transaksi">Kriteria Transaksi <span class="required">*</span></label>
            <div class="controls">
                <select class="span4" name="dailyBoArray[<?php echo $key?>][kriteria_transaksi]" id="<?php echo $selectId; ?>" >
                    <option value="">Pilih Kriteria Nasabah</option>
                    <option value="1" <?php echo $dataSelect==1?'selected':''?> >Transaksi Biaya</option>
                    <option value="2" <?php echo $dataSelect==2?'selected':''?> >Transaksi SKN</option>
                    <option value="3" <?php echo $dataSelect==3?'selected':''?> >Transaksi RTGS</option>
                    <option value="4" <?php echo $dataSelect==4?'selected':''?> >Pembukaan Deposito</option>
                    <option value="5" <?php echo $dataSelect==5?'selected':''?>>Pencairan Deposito</option>
                    <option value="6" <?php echo $dataSelect==6?'selected':''?>>Pencairan Small & Konsumer</option>
                    <option value="7" <?php echo $dataSelect==7?'selected':''?>>Pelunasan Small & Konsumer</option>
                    <option value="8" <?php echo $dataSelect==8?'selected':''?>>Pencairan Mikro</option>
                    <option value="9" <?php echo $dataSelect==9?'selected':''?>>Pelunasan Mikro</option>
                    <option value="10" <?php echo $dataSelect==10?'selected':''?>>Pencairan Talangan Haji</option>
                    <option value="11" <?php echo $dataSelect==11?'selected':''?>>Pelunasan Talangan Haji</option>
                    <option value="12" <?php echo $dataSelect==12?'selected':''?>>Pencairan/Perpanjangan Gadai Emas</option>
                    <option value="13" <?php echo $dataSelect==13?'selected':''?>>Pelunasan Gadai Emas</option>
                    <option value="14" <?php echo $dataSelect==14?'selected':''?>>Penginputan BI Checking</option>
                    <option value="15" <?php echo $dataSelect==15?'selected':''?>>Pembayaran Biaya Bulanan</option>
                    <option value="16" <?php echo $dataSelect==16?'selected':''?>>Pembayaran Rekanan</option>
                    <option value="17" <?php echo $dataSelect==17?'selected':''?>>Transaksi Pembayaran Angsuran</option>
                    <option value="18" <?php echo $dataSelect==18?'selected':''?>>Transaksi Penyusutan Bulanan</option>
                    <option value="19" <?php echo $dataSelect==19?'selected':''?>>Pelaporan - SID</option>
                    <option value="20" <?php echo $dataSelect==20?'selected':''?>>Pelaporan - Pajak</option>
                    <option value="21" <?php echo $dataSelect==21?'selected':''?>>Pelaporan - Lembur Staff</option>
                    <option value="22" <?php echo $dataSelect==22?'selected':''?>>Pelaporan - Lembur Non-Staff</option>
                    <option value="23" <?php echo $dataSelect==23?'selected':''?>>Pelaporan - Proofsheet</option>
                    <option value="24" <?php echo $dataSelect==24?'selected':''?>>Rekap Absensi</option>
                    <option value="25" <?php echo $dataSelect==25?'selected':''?>>Aktivitas Kepegawaian</option>
                </select>
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]kriteria_transaksi"); ?>
                </span>
            </div>
        </div> 
    
        <div class="control-group ">
            <label class="control-label required" for="dailyBo_status_transaksi">Status Transaksi <span class="required">*</span></label>
            <div class="controls">
                <select class="span4" name="dailyBoArray[<?php echo $key?>][status_transaksi]" id="<?php echo $selectId2; ?>" >
                    <option value="">Pilih Status Transaksi</option>
                    <option value="1" <?php echo $dataSelect2==1?'selected':''?> >DONE</option>
                    <option value="2" <?php echo $dataSelect2==2?'selected':''?> >ON PROGRESS</option>
                    <option value="3" <?php echo $dataSelect2==3?'selected':''?> >PENDING</option>                    
                </select>
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]status_transaksi"); ?>
                </span>
            </div>
        </div>       
    
        <div class="control-group">
            <?php echo $form->labelEx($model, "[$key]jumlah_transaksi",  array('class'=>'control-label'));?>
            <div class="controls">
                <?php echo $form->textField($model, "[$key]jumlah_transaksi", array('class'=>'span2', 'onClick'=>'checkForSelect(this);'));?>   
                <span class="help-inline error">
                <?php echo $form->error($model,"[$key]jumlah_transaksi"); ?>
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
