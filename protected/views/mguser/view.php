<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	$mj =>array('index','id'=>$model->hak_akses),
	$model->user_name,
);

$this->menu=array(
	array('label'=>'Daftar '.$mj, 'url'=>array('index', 'id'=>$model->hak_akses)),
	array('label'=>'Tambah '.$mj, 'url'=>array('create', 'id'=>$model->hak_akses)),
	array('label'=>'Edit User', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Hapus User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>Detail User #<?php echo $model->user_name; ?></h1>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
//	'type'=>'bordered striped',
	'data'=>$model,
	'attributes'=>array(
		//'user_id',
		'user_name',
		'email_address',
		'rJab.nama_jabatan',
		//'password',
		//'rHak.nama_hak_akses',		
	),
)); ?>

