<?php
$this->breadcrumbs=array(
	'Daftar Nasabah'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Daftar Nasabah','url'=>array('index')),
    array('label'=>'Manajemen Daftar Nasabah','url'=>array('admin')),	
);
?>

<h1>Tambah Data Nasabah</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'list'=>$list,)); ?>