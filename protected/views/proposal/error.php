<?php

$this->breadcrumbs=array(	
	'Failed Insert Proposal',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-danger">
  Proposal Tidak Dapat di Proses
  <br />
  <?php 
    if($model_proposal->nasabahError == vC::APP_nasabah_error_tolak) {
        ?>
  <b>Error Code:</b>Termasuk Nasabah Ditolak<br/>
  <b>No proposal ditolak:</b><?php echo $model_proposal->proposalError; ?><br/>
  <b>Percobaan Pengajuan:</b><?php echo $model_proposal->percobaanInput; ?><br/>
        <?php
    }
  ?>
</div>
<div class="form-actions">
    <?php echo CHtml::link('Input Proposal',array('proposal/create'), array('class'=>'btn btn-primary')); ?>        
</div>
