<?php

$this->breadcrumbs=array(	
	'Complete Vote',
);

$this->menu=array(
	//array('label'=>'List Pegawai','url'=>array('index')),	
);
?>
<div class="alert alert-success">
  Berhasil Vote
</div>
<div class="form-actions">
    <?php echo CHtml::link('Back To Home',array('site/'), array('class'=>'btn btn-primary')); ?>        
</div>
