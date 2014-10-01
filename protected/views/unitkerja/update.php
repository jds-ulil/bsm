<?php
$this->breadcrumbs=array(
	'Unitkerjas'=>array('index'),
	$model->unit_kerja_id=>array('view','id'=>$model->unit_kerja_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Unit Kerja','url'=>array('index')),
	array('label'=>'Tambah Unit Kerja','url'=>array('create')),
	array('label'=>'Lihat Unit Kerja','url'=>array('view','id'=>$model->unit_kerja_id)),	
);
?>

<h1>Edit Unit Kerja</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>