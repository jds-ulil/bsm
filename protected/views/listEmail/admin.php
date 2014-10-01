<?php
$this->breadcrumbs=array(
	'List Email',
);

$this->menu=array(
	//array('label'=>'List ListEmail','url'=>array('index')),
	array('label'=>'Tambah Email','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('list-email-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Daftar List Email</h1>


<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
    'list'=>$list,
    'listNotif'=>$listNotif,
)); ?>
</div><!-- search-form -->
<?php 
    if (Yii::app()->user->checkAccess('inputter')) {
	?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'list-email-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'columns'=>array(
		//'id_list_email',
		'email_address',
		'nama_pengguna',
        array(
                'name'=>'jabatan_id',
                'value'=>'$data->rJab->nama_jabatan',
            ),
        array(
                'name'=>'status',
                'value'=>'$data->rNot->nama',
            ),
		//'jabatan_id',
		//'status',
		array
		(
		    'class'=>'bootstrap.widgets.TbButtonColumn',
		    'template'=>'{view}',
		)
	),
)); ?>	
<?php	
    } else if (Yii::app()->user->checkAccess('approval')) {
?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'list-email-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'columns'=>array(
		//'id_list_email',
		'email_address',
		'nama_pengguna',
        array(
                'name'=>'jabatan_id',
                'value'=>'$data->rJab->nama_jabatan',
            ),
        array(
                'name'=>'status',
                'value'=>'$data->rNot->nama',
            ),
		//'jabatan_id',
		//'status',
		array
		(
		    'class'=>'bootstrap.widgets.TbButtonColumn',
		    'template'=>'{view}{update}',
		)
	),
)); ?>

<?php } if (Yii::app()->user->checkAccess('admin')) { ?> 
    <?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'list-email-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'filterPosition'=>'footer',
	'columns'=>array(
		//'id_list_email',
		'email_address',
		'nama_pengguna',
        array(
                'name'=>'jabatan_id',
                'value'=>'$data->rJab->nama_jabatan',
            ),
        array(
                'name'=>'status',
                'value'=>'$data->rNot->nama',
            ),
		//'jabatan_id',
		//'status',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		    
		),
	),
)); ?>
    <?php }//end else ?>
