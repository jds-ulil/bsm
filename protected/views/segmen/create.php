<?php
$this->breadcrumbs=array(
	'Segmen'=>array('index'),
	'Baru',
);

$this->menu=array(
	array('label'=>'Daftar Segmen','url'=>array('index')),	
);
?>

<h1>Segmen Baru</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>