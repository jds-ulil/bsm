<?php
$this->breadcrumbs=array(
	'Pelunasans',
);

$this->menu=array(
	array('label'=>'Create pelunasan','url'=>array('create')),
	array('label'=>'Manage pelunasan','url'=>array('admin')),
);
?>

<h1>Pelunasans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
