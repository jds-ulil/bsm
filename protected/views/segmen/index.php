<?php
$this->breadcrumbs=array(
	'Segmen',
);

$this->menu=array(
	array('label'=>'Tambah Segmen','url'=>array('create')),	
);
?>

<h1>Segmen</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'segmen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'columns'=>array(		
		'nama',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

