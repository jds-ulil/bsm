<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	'Baru',
);

$this->menu=array(
	array('label'=>'List Pegawai','url'=>array('index')),	
);
?>

<h1>Pegawai Baru</h1>

<?php echo $this->renderPartial('_form', 
        array(
            'model'=>$model,
            'list'=>$list,
            'listUnit'=>$listUnit,
        )); ?>