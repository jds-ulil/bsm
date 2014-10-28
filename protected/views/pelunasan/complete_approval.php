<?php

$this->breadcrumbs=array(	
	'Complete Pelunasan',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-success">
  <?php echo "Terima Kasih, proses berhasil" ?>
</div>
<div class="form-actions">
    <?php echo CHtml::link('Kembali ke daftar',array('pelunasan/approval'), array('class'=>'btn btn-success')); ?>        
</div>
