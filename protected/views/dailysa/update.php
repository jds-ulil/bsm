<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Sales Assistant'=>array('index'),
	$model->sa_kriteria_nasabah_id=>array('view','id'=>$model->sa_kriteria_nasabah_id),
	'Update',
);

$this->menu=array(
    array('label'=>'Daftar Kriteria Nasabah','url'=>array('index')),
	array('label'=>'Kriteria Nasabah Baru','url'=>array('create')),	
	array('label'=>'Detail Nasabah','url'=>array('view','id'=>$model->sa_kriteria_nasabah_id)),	
);
?>

<h1 class="loginHead">Update Kriteria Nasabah Sales Assistant</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>