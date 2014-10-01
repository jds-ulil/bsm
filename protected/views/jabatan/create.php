<?php
$this->breadcrumbs=array(
	'Jabatan'=>array('index'),
	'Buat',
);

$this->menu=array(
	array('label'=>'List Jabatan','url'=>array('index')),
);
?>

<h1>Tambah Jabatan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>