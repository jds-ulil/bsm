<?php
$this->breadcrumbs=array(
	'Pelunasans'=>array('index'),
	$model->pelunasan_id=>array('view','id'=>$model->pelunasan_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List pelunasan','url'=>array('index')),
	array('label'=>'Create pelunasan','url'=>array('create')),
	array('label'=>'View pelunasan','url'=>array('view','id'=>$model->pelunasan_id)),
	array('label'=>'Manage pelunasan','url'=>array('admin')),
);
?>

<h1>Update pelunasan <?php echo $model->pelunasan_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>