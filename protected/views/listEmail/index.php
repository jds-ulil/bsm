<?php
$this->breadcrumbs=array(
	'List Email',
);

$this->menu=array(
	array('label'=>'Email Baru','url'=>array('create')),
	array('label'=>'Manajemen Email Address','url'=>array('admin')),
);
?>

<h1>List Email</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


