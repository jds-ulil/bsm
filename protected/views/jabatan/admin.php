<?php
$this->breadcrumbs=array(
	'Daftar Jabatan',
);

$this->menu=array(
	array('label'=>'Buat Jabatan','url'=>array('create')),
);

?>

<h1>Daftar Jabatan</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jabatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'bordered striped',
	'columns'=>array(
		//'id_jabatan',
		'nama_jabatan',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
