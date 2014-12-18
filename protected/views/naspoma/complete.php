<?php

$this->breadcrumbs=array(	
	'Complete Nasabah Potensi Masalah',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-success">
  Data Berhasil Disimpan
</div>
<div class="form-actions">
    <?php echo CHtml::link('Input Nasabah Potensi Masalah',array('naspoma/create'), array('class'=>'btn btn-success')); ?>        
</div>
