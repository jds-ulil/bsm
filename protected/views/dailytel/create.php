<?php
$this->breadcrumbs=array(
	'Kriteria Transaksi Teller'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Kriteria Transaksi','url'=>array('index')),	
);
?>

<h1 class="loginHead">Kriteria Transaksi Baru Teller</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>