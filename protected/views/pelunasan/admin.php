<?php
$this->breadcrumbs=array(
	'Pelunasans'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List pelunasan','url'=>array('index')),
	array('label'=>'Create pelunasan','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pelunasan-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pelunasans</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pelunasan-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pelunasan_id',
		'tanggal_pelunasan',
		'penyebab',
		'segmen',
		'jenis_usaha',
		'nama_nasabah',
		/*
		'no_CIF',
		'no_rekening',
		'plafon_awal',
		'OS_pokok_terakhir',
		'angsuran',
		'kolektibilitas_terakhir',
		'alamat_nasabah',
		'jenis_pembiayaan',
		'margin',
		'tunggakan_terakhir',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
