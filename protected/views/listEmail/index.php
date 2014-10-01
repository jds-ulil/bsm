<?php
$this->breadcrumbs=array(
	'List Email',
);

$this->menu=array(
	array('label'=>'Tambah Email Address','url'=>array('create')),
	array('label'=>'Manajemen Email Address','url'=>array('admin')),
);
?>

<h1>List Email</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


