<?php
$this->breadcrumbs=array(
	'Unitkerja'=>array('index'),
	'Baru',
);

$this->menu=array(
	array('label'=>'Daftar Unit Kerja','url'=>array('index')),	
);
?>

<h1 class="loginHead">Tambah Unit Kerja</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>