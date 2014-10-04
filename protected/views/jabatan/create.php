<?php
$this->breadcrumbs=array(
	'Jabatan'=>array('index'),
	'Baru',
);

$this->menu=array(
	array('label'=>'List Jabatan','url'=>array('index')),
);
?>

<h1>Jabatan Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>