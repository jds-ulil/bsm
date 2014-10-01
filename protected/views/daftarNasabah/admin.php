<?php
$this->breadcrumbs=array(
	'Daftar Nasabah'=>array('index'),
	'Manajemen',
);

$this->menu=array(
	array('label'=>'List Daftar Nasabah','url'=>array('index')),
	array('label'=>'Tambah Nasabah','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('daftar-nasabah-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Data Nasabah</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'list'=>$list,       
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'daftar-nasabah-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'nasabah_id',
		'kartukeluarga_id',
		'nama',
		'alamat',
		  array(
                'name'=>'status',
                'value'=>'$data->sNas->nama_status',
            ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
