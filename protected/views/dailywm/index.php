<?php
$this->breadcrumbs=array(
	'Kriteria Nasabah Warung Mikro',
);

$this->menu=array(
	array('label'=>'Kriteria Nasabah Baru','url'=>array('create')),	
);
?>
<h2 class="loginHead">Kriteria Nasabah Warung Mikro</h2>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kolektabilitas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'bordered striped',
	'filterPosition'=>'footer',    
	'columns'=>array(
		//'kolektabilitas_id',
		'nama',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
