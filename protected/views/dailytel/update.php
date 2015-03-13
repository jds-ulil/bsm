<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Customer Service'=>array('index'),
	$model->jenis_transaksi_id=>array('view','id'=>$model->jenis_transaksi_id),
	'Update',
);

$this->menu=array(
    array('label'=>'Daftar Kriteria Transaksi','url'=>array('index')),
	array('label'=>'Kriteria Transaksi Baru','url'=>array('create')),	
	array('label'=>'Detail Transaksi','url'=>array('view','id'=>$model->jenis_transaksi_id)),	
);
?>

<h1 class="loginHead">Update Kriteria Nasabah Teller</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>