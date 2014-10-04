<?php
$this->breadcrumbs=array(
	'Jabatan'=>array('index'),
	$model->nama_jabatan,
);

$this->menu=array(
    array('label'=>'Daftar Jabatan','url'=>array('index')),
	array('label'=>'Jabatan Baru','url'=>array('create')),
	array('label'=>'Edit Jabatan','url'=>array('update','id'=>$model->id_jabatan)),
	array('label'=>'Hapus Jabatan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_jabatan),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>Detail Jabatan</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
   // 'type'=>'bordered striped',
	'attributes'=>array(
		//'id_jabatan',
		'nama_jabatan',
	),
)); ?>
