<?php
$this->breadcrumbs=array(
	'Kolektibilitas'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Kolektibilitas','url'=>array('index')),
	array('label'=>'Kolektibilitas Baru','url'=>array('create')),
	array('label'=>'Edit Kolektibilitas','url'=>array('update','id'=>$model->kolektabilitas_id)),
	array('label'=>'Hapus Kolektibilitas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->kolektabilitas_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'header'=>'DETAIL KOLEKTIBILITAS',
	'attributes'=>array(
		//'kolektabilitas_id',
		'nama',
	),
)); ?>
