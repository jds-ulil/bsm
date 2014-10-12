<?php
$this->breadcrumbs=array(
	'Kolektibilitas'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Kolektibilitas','url'=>array('index')),	
);
?>

<h1>Kolektibilitas Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>