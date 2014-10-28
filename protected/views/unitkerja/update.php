<?php
$this->breadcrumbs=array(
	'Unitkerjas'=>array('index'),
	$model->unit_kerja_id=>array('view','id'=>$model->unit_kerja_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Unit Kerja','url'=>array('index')),
	array('label'=>'Unit Kerja Baru','url'=>array('create')),
	array('label'=>'Detail Unit Kerja','url'=>array('view','id'=>$model->unit_kerja_id)),	
);
?>

<h1 class="loginHead">Edit Unit Kerja</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>