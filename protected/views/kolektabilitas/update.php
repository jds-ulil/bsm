<?php
$this->breadcrumbs=array(
	'Kolektabilitas'=>array('index'),
	$model->kolektabilitas_id=>array('view','id'=>$model->kolektabilitas_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Kolektabilitas','url'=>array('index')),
	array('label'=>'Kolektabilitas Baru','url'=>array('create')),
	array('label'=>'Detail Kolektabilitas','url'=>array('view','id'=>$model->kolektabilitas_id)),	
);
?>

<h1>Update Kolektabilitas</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>