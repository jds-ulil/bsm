<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Customer Service'=>array('index'),
	$model->jenis_nasabah_id=>array('view','id'=>$model->jenis_nasabah_id),
	'Update',
);

$this->menu=array(
    array('label'=>'Daftar Kriteria Nasabah','url'=>array('index')),
	array('label'=>'Kriteria Nasabah Baru','url'=>array('create')),	
	array('label'=>'Detail Nasabah','url'=>array('view','id'=>$model->jenis_nasabah_id)),	
);
?>

<h1 class="loginHead">Update Kriteria Nasabah Security</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>