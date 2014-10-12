<?php
$this->breadcrumbs=array(
	'Kolektibilitas'=>array('index'),
	$model->kolektabilitas_id=>array('view','id'=>$model->kolektabilitas_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Kolektibilitas','url'=>array('index')),
	array('label'=>'Kolektibilitas Baru','url'=>array('create')),
	array('label'=>'Detail Kolektibilitas','url'=>array('view','id'=>$model->kolektabilitas_id)),	
);
?>

<h1>Update Kolektibilitas</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>