<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(	
	$mj,
);

$this->menu=array(
	//array('label'=>'Daftar User', 'url'=>array('index')),
	array('label'=>'Tambah '.$mj, 'url'=>array('create','id'=>$model->hak_akses)),
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

<h1>Manajemen <?php echo $mj; ?></h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	'list'=>$list,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',    
	'columns'=>array(
	//	'user_id',
		'user_name',
		'email_address',
         array(
                'name'=>'jabatan_id',
                'value'=>'$data->rJab->nama_jabatan',
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
