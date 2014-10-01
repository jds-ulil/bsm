<?php
$this->breadcrumbs=array(
	'Daftar Nasabahs'=>array('index'),
	$model->nasabah_id=>array('view','id'=>$model->nasabah_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Daftar Nasabah','url'=>array('index')),
	array('label'=>'Tambah Nasabah','url'=>array('create')),
	array('label'=>'Detail Nasabah','url'=>array('view','id'=>$model->nasabah_id)),
	array('label'=>'Manajemen Daftar Nasabah','url'=>array('admin')),	
);
?>

<h1>Update DaftarNasabah <?php echo $model->nasabah_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'list'=>$list,)); ?>