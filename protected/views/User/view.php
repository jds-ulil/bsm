<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_name,
);

$this->menu=array(
	array('label'=>'Daftar User', 'url'=>array('index')),
	array('label'=>'Buat User', 'url'=>array('create')),
	array('label'=>'Edit User', 'url'=>array('update', 'id'=>$model->user_id)),
	array('label'=>'Hapus User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->user_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manajemen User', 'url'=>array('admin')),
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
		'rHak.nama_hak_akses',		
	),
)); ?>

