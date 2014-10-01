<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manajemen',
);

$this->menu=array(
	array('label'=>'Daftar User', 'url'=>array('index')),
	array('label'=>'Buat User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mtb-user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manajemen Users</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'list'=>$list,
    'listAkses'=>$listAkses,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	//	'user_id',
		'user_name',
		'email_address',
         array(
                'name'=>'jabatan_id',
                'value'=>'$data->rJab->nama_jabatan',
            ),
         array(
                'name'=>'hak_akses',
                'value'=>'$data->rHak->nama_hak_akses',
            ),				
        array(
            'header' => 'Proses',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{update}{delete}',
			'htmlOptions' => array(
			//    'width' => '6%',
			    //'align' => 'center',
			),
        )
	),
)); ?>
