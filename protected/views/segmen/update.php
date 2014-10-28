<?php
$this->breadcrumbs=array(
	'Segmens'=>array('index'),
	$model->segmen_id=>array('view','id'=>$model->segmen_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Segmen','url'=>array('index')),
	array('label'=>'Segmen Baru','url'=>array('create')),
	array('label'=>'Detail Segmen','url'=>array('view','id'=>$model->segmen_id)),	
);
?>

<h1 class="loginHead">Update Segmen <?php echo $model->segmen_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>