<?php
$this->breadcrumbs=array(
	'Pelunasans'=>array('index'),
	$model->pelunasan_id,
);

$this->menu=array(
	array('label'=>'List pelunasan','url'=>array('index')),
	array('label'=>'Create pelunasan','url'=>array('create')),
	array('label'=>'Update pelunasan','url'=>array('update','id'=>$model->pelunasan_id)),
	array('label'=>'Delete pelunasan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->pelunasan_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage pelunasan','url'=>array('admin')),
);
?>

<h1>View pelunasan #<?php echo $model->pelunasan_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'pelunasan_id',
		'tanggal_pelunasan',
		'penyebab',
		'segmen',
		'jenis_usaha',
		'nama_nasabah',
		'no_CIF',
		'no_rekening',
		'plafon_awal',
		'OS_pokok_terakhir',
		'angsuran',
		'kolektibilitas_terakhir',
		'alamat_nasabah',
		'jenis_pembiayaan',
		'margin',
		'tunggakan_terakhir',
	),
)); ?>
