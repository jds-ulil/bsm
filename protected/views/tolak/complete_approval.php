<?php

$this->breadcrumbs=array(	
	'Complete Nasabah Tolak',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-success">
  <?php echo "Terima Kasih, proses berhasil" ?>
</div>
<div class="form-actions">
    <?php echo CHtml::link('Kembali ke daftar',array('tolak/approval'), array('class'=>'btn btn-primary')); ?>        
</div>
