<?php
$this->breadcrumbs=array(
	'Jabatans'=>array('index'),
	$model->id_jabatan=>array('view','id'=>$model->id_jabatan),
	'Update',
);

$this->menu=array(
    array('label'=>'Daftar Jabatan','url'=>array('index')),
	array('label'=>'Jabatan Baru','url'=>array('create')),
	array('label'=>'Detail Jabatan','url'=>array('view','id'=>$model->id_jabatan)),	
);
?>

<h1>Update Jabatan <?php echo $model->id_jabatan; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>