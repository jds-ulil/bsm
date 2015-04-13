<?php
$this->breadcrumbs=array(
	'Kriteria Transaksi',
);

$this->menu=array(
	array('label'=>'Kriteria Transaksi Baru','url'=>array('create')),	
);
?>
<h2 class="loginHead">Kriteria Transaksi Back Office</h2>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kolektabilitas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'bordered striped',
	'filterPosition'=>'footer',    
	'columns'=>array(
		//'kolektabilitas_id',
		'nama',
        'rank',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
