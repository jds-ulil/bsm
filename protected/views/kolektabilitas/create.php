<?php
$this->breadcrumbs=array(
	'Kolektabilitas'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Kolektabilitas','url'=>array('index')),	
);
?>

<h1>Tambah Kolektabilitas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>