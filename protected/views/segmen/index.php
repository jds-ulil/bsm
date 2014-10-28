<?php
$this->breadcrumbs=array(
	'Segmen',
);

$this->menu=array(
	array('label'=>'Segmen Baru','url'=>array('create')),	
);
?>

<h1 class="loginHead">Segmen</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'segmen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
    'type'=>'bordered striped',
	'columns'=>array(		
		'nama',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>

