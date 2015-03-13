<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Sales Assistant'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Kriteria Nasabah','url'=>array('index')),	
);
?>

<h1 class="loginHead">Kriteria Nasabah Baru Sales Assistant</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>