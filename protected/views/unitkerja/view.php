<?php
$this->breadcrumbs=array(
	'Unitkerja'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'List Unit Kerja','url'=>array('index')),
	array('label'=>'Tambah Unit Kerja','url'=>array('create')),
	array('label'=>'Edit Unit Kerja','url'=>array('update','id'=>$model->unit_kerja_id)),
	array('label'=>'Hapus Unit Kerja','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->unit_kerja_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>Detail Unit Kerja</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(		
		'nama',
	),
)); ?>
