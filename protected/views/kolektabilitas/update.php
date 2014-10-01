<?php
$this->breadcrumbs=array(
	'Kolektabilitases'=>array('index'),
	$model->kolektabilitas_id=>array('view','id'=>$model->kolektabilitas_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Kolektabilitas','url'=>array('index')),
	array('label'=>'Create Kolektabilitas','url'=>array('create')),
	array('label'=>'View Kolektabilitas','url'=>array('view','id'=>$model->kolektabilitas_id)),
	array('label'=>'Manage Kolektabilitas','url'=>array('admin')),
);
?>

<h1>Update Kolektabilitas</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>