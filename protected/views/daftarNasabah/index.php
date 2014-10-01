<?php
$this->breadcrumbs=array(
	'Daftar Nasabah',
);

if ( Yii::app()->user->checkAccess('admin') ) {
$this->menu=array(
	array('label'=>'Tambah Nasabah','url'=>array('create')),
	array('label'=>'Manajemen Daftar Nasabah','url'=>array('admin')),
);
} else if ( Yii::app()->user->checkAccess('otor') ) {
$this->menu=array(
	array('label'=>'Tambah Nasabah','url'=>array('create')),
	array('label'=>'Manajemen Daftar Nasabah','url'=>array('admin')),
);
} else {
$this->menu=array(
	array('label'=>'Tambah Nasabah','url'=>array('create')),
);    
}

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

<h1>Daftar Nasabah</h1>

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
        'header'=>'Apply',
        'type'=>'raw',
        'value'=>'$data->status == "1" ? CHtml::link("Apply",array("daftarNasabah/view","id"=>"$data->nasabah_id")) : "Applied"',

        ),
		//array(
			//'class'=>'bootstrap.widgets.TbButtonColumn',
		//),
	),
)); ?>
