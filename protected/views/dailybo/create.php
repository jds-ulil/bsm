<?php
$this->breadcrumbs=array(
	'Kriteria Transaksi'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Kriteria Transaksi','url'=>array('index')),	
);
?>

<h1 class="loginHead">Kriteria Transaksi Baru Back Office</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>