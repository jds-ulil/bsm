<?php
$this->breadcrumbs=array(
	'Kolektibilitas'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Kriteria Transaksi','url'=>array('index')),
	array('label'=>'Kriteria Transaksi Baru','url'=>array('create')),
	array('label'=>'Edit Kriteria Transaksi','url'=>array('update','id'=>$model->jenis_transaksi_id)),
	array('label'=>'Hapus Kriteria Transaksi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->jenis_transaksi_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'header'=>'DETAIL KRITERIA TRANSAKSI',
	'attributes'=>array(
		//'kolektabilitas_id',
		'nama',
	),
)); ?>
