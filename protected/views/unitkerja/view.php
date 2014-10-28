<?php
$this->breadcrumbs=array(
	'Unitkerja'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Unit Kerja','url'=>array('index')),
	array('label'=>'Unit Kerja Baru','url'=>array('create')),
	array('label'=>'Edit Unit Kerja','url'=>array('update','id'=>$model->unit_kerja_id)),
	array('label'=>'Hapus Unit Kerja','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->unit_kerja_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'header'=>'DETAIL UNIT KERJA',
	'attributes'=>array(		
		'nama',
	),
)); ?>
