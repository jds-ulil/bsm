<?php
$this->breadcrumbs=array(
	'Unitkerja'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Unit Kerja','url'=>array('index')),	
);
?>

<h1>Tambah Unit Kerja</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>