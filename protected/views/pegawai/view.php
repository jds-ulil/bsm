<?php
$this->breadcrumbs=array(
	'Pegawais'=>array('index'),
	$model->pegawai_id,
);

$this->menu=array(
	array('label'=>'List Pegawai','url'=>array('index')),
	array('label'=>'Tambah Pegawai','url'=>array('create')),
	array('label'=>'Edit Pegawai','url'=>array('update','id'=>$model->pegawai_id)),
	array('label'=>'Hapus Pegawai','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->pegawai_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>Detail data pegawai #<?php echo $model->nama; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'pegawai_id',
		'no_urut',
		'nama',
		'NIP',
		'rJab.nama_jabatan',
		'no_handphone',
		'email',
		'unit_kerja',
		'email_atasan',
	),
)); ?>
