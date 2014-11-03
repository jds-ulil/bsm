<?php
$this->breadcrumbs=array(
	'Texts'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Daftar Teks','url'=>array('index')),
	array('label'=>'Tambah Teks','url'=>array('create')),
	array('label'=>'Detail Teks','url'=>array('view','id'=>$model->id)),	
);
?>

<h1 class="loginHead">Edit Teks</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>