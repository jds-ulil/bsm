<?php
$this->breadcrumbs=array(
	'Kolektibilitas',
);

$this->menu=array(
	array('label'=>'Kolektibilitas Baru','url'=>array('create')),	
);
?>
<h2>Daftar Kolektibilitas</h2>
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
