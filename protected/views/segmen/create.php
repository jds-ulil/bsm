<?php
$this->breadcrumbs=array(
	'Segmen'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Segmen','url'=>array('index')),	
);
?>

<h1>Tambah Segmen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>