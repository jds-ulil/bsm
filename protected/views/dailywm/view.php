<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Warung Mikro'=>array('index'),
	$model->nama,
);

$this->menu=array(
	array('label'=>'Daftar Kriteria Nasabah','url'=>array('index')),
	array('label'=>'Kriteria Nasabah Baru','url'=>array('create')),
	array('label'=>'Edit Kriteria Nasabah','url'=>array('update','id'=>$model->wm_kriteria_nasabah_id)),
	array('label'=>'Hapus Kriteria Nasabah','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->wm_kriteria_nasabah_id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
        'header'=>'DETAIL KRITERIA NASABAH WARUNG MIKRO',
	'attributes'=>array(
		//'kolektabilitas_id',
		'nama',
        'rank',
	),
)); ?>
