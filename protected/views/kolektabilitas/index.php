<?php
$this->breadcrumbs=array(
	'Kolektabilitas',
);

$this->menu=array(
	array('label'=>'Kolektabilitas Baru','url'=>array('create')),	
);
?>
<h2>Daftar Kolektabilitas</h2>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kolektabilitas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',    
	'columns'=>array(
		//'kolektabilitas_id',
		'nama',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
