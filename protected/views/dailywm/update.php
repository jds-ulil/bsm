<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Warung Mikro'=>array('index'),
	$model->wm_kriteria_nasabah_id=>array('view','id'=>$model->wm_kriteria_nasabah_id),
	'Update',
);

$this->menu=array(
    array('label'=>'Daftar Kriteria Nasabah','url'=>array('index')),
	array('label'=>'Kriteria Nasabah Baru','url'=>array('create')),	
	array('label'=>'Detail Nasabah','url'=>array('view','id'=>$model->wm_kriteria_nasabah_id)),	
);
?>

<h1 class="loginHead">Update Kriteria Nasabah Warung Mikro</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>