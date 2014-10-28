<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'List Pegawai','url'=>array('index')),
	array('label'=>'Pegawai Baru','url'=>array('create')),
	array('label'=>'Edit Pegawai','url'=>array('update','id'=>$model->pegawai_id)),
	array('label'=>'Hapus Pegawai','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->pegawai_id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'header' => "DETAIL PEGAWAI",
	'attributes'=>array(
		//'pegawai_id',
		'no_urut',
		'nama',
		'NIP',
		'rJab.nama_jabatan',
		'rLevJab.nama_jabatan',
		'no_handphone',
		'email',
		'rUnK.nama',
		'email_atasan',
	),
)); ?>
