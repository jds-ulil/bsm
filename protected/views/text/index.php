<?php
$this->breadcrumbs=array(
	'Running Teks',
);
$this->menu=array(	
	array('label'=>'Tambah Teks','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('text-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="loginHead">Pengaturan Teks</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'text-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'type'=>'bordered striped',
	'columns'=>array(		
		'text',
        array (
            'name'=>'show',
            'value'=>'$data->show==1?"Tampil":"Tidak Tampil"',
        ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
