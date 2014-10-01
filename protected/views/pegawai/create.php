<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'List Pegawai','url'=>array('index')),	
);
?>

<h1>Tambah Pegawai</h1>

<?php echo $this->renderPartial('_form', 
        array(
            'model'=>$model,
            'list'=>$list,
            'listUnit'=>$listUnit,
        )); ?>