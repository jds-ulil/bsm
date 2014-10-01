<?php
$this->breadcrumbs=array(
	'Unit Kerja',
);

$this->menu=array(
	array('label'=>'Tambah Unit Kerja','url'=>array('create')),	
);
?>

<h1>Daftar Unit Kerja</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'unitkerja-grid',
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

