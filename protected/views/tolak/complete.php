<?php

$this->breadcrumbs=array(	
	'Complete Insert Proposal',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-success">
  Data Berhasil Disimpan
</div>
<div class="form-actions">
    <?php echo CHtml::link('Input Nasabah Ditolak',array('tolak/create'), array('class'=>'btn btn-primary')); ?>        
</div>
