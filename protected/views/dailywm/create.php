<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Warung Mikro'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Kriteria Nasabah','url'=>array('index')),	
);
?>

<h1 class="loginHead">Kriteria Nasabah Baru Warung Mikro</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>