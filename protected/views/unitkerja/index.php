<?php
$this->breadcrumbs=array(
	'Unit Kerja',
);

$this->menu=array(
	array('label'=>'Unit Kerja Baru','url'=>array('create')),	
);
?>

<h1 class="loginHead">Daftar Unit Kerja</h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'unitkerja-grid',
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

