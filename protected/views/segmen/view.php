<?php
$this->breadcrumbs=array(
	'Segmen'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Segmen','url'=>array('index')),
	array('label'=>'Segmen Baru','url'=>array('create')),
	array('label'=>'Edit Segmen','url'=>array('update','id'=>$model->segmen_id)),
	array('label'=>'Delete Segmen','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->segmen_id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Segmen','url'=>array('admin')),
);
?>

<h1>Lihat Segmen</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'segmen_id',
		'nama',
	),
)); ?>
