<?php
$this->breadcrumbs=array(
	'Pegawai'=>array('index'),
	$model->pegawai_id=>array('view','id'=>$model->pegawai_id),
	'Edit',
);

$this->menu=array(
	array('label'=>'List Pegawai','url'=>array('index')),
	array('label'=>'Tambah Pegawai','url'=>array('create')),
	array('label'=>'Detail Pegawai','url'=>array('view','id'=>$model->pegawai_id)),	
);
?>

<h1>Edit pegawai <?php echo $model->nama; ?></h1>

<?php echo $this->renderPartial('_form',
        array('model'=>$model,
                'list'=>$list,
                'listUnit'=>$listUnit,
            )); ?>