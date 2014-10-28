<?php

$this->breadcrumbs=array(	
	'Complete Insert Pelunasan',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-success">
  Data Berhasil Disimpan
</div>
<div class="form-actions">
    <?php echo CHtml::link('Input Pelunasan',array('pelunasan/create'), array('class'=>'btn btn-success')); ?>        
</div>
