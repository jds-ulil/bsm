<?php
$this->breadcrumbs=array(
	'Segmens'=>array('index'),
	$model->segmen_id=>array('view','id'=>$model->segmen_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Segmen','url'=>array('index')),
	array('label'=>'Create Segmen','url'=>array('create')),
	array('label'=>'View Segmen','url'=>array('view','id'=>$model->segmen_id)),
	array('label'=>'Manage Segmen','url'=>array('admin')),
);
?>

<h1>Update Segmen <?php echo $model->segmen_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>