<?php

$this->breadcrumbs=array(	
	'Failed Input Proposal',
);
?>
<div class="alert alert-danger">
  Proposal Tidak Dapat di disimpan
  <br />
  <b>Gagal Mengirim Email Notif</b>
  <b>Silahkan Periksa Kembali Jaringan Dan Configurasi Email</b>   
</div>
<div class="form-actions">
    <?php echo CHtml::link('Input Nasabah Tolak',array('tolak/create'), array('class'=>'btn btn-primary')); ?>        
</div>
