<?php
$this->breadcrumbs=array(
	'Teks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Daftar teks','url'=>array('index')),
	array('label'=>'Tambah teks','url'=>array('create')),
	array('label'=>'Edit teks','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete teks','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'header'=>"Detail Teks",
	'attributes'=>array(
		//'id',
		'text',
        array(
                'name'=>'Show',
                'value'=>$model->show == 1?"Tampil":"Tidak Tampil",
                ),		
	),
)); ?>
