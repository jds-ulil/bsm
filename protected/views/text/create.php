<?php
$this->breadcrumbs=array(
	'Daftar Teks'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Daftar teks','url'=>array('index')),
);
?>

<h1 class="loginHead">Tambah text</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>