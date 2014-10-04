<?php
$this->breadcrumbs=array(
	'Kolektabilitas'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Kolektabilitas','url'=>array('index')),
	array('label'=>'Kolektabilitas Baru','url'=>array('create')),
	array('label'=>'Edit Kolektabilitas','url'=>array('update','id'=>$model->kolektabilitas_id)),
	array('label'=>'Hapus Kolektabilitas','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->kolektabilitas_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>Detail Kolektabilitas</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'kolektabilitas_id',
		'nama',
	),
)); ?>
