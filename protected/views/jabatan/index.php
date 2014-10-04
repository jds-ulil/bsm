<?php
$this->breadcrumbs=array(
	'Jabatan',
);

$this->menu=array(
	array('label'=>'Jabatan Baru','url'=>array('create')),	
);
?>

<h1>List Jabatan</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jabatan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'columns'=>array(
		//'id_jabatan',
		'nama_jabatan',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>