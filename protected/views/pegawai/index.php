<?php
$this->breadcrumbs=array(
	'Pegawai',
);

$this->menu=array(
	array('label'=>'Pegawai Baru','url'=>array('create')),	
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pegawai-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="loginHead">Pegawai</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
        'list'=>$list,
        'listUnit'=>$listUnit,
        'listLevel'=>$listLevel,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pegawai-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'type'=>'bordered striped',
    'filterPosition'=>'footer',
    'enableSorting' => false,
	'columns'=>array(
		//'pegawai_id',		
        array(
              'name'=>'no_urut',
              'value'=>'$data->no_urut',
              'htmlOptions'=>array('width'=>'30'),
          ), 
		'nama',
		'NIP',
		 array(
                'name'=>'jabatan',
                'value'=>'empty($data->rJab->nama_jabatan)?"Reset":$data->rJab->nama_jabatan',
                ),
		 array(
                'name'=>'level_jabatan',
                'value'=>'empty($data->rLevJab->nama_jabatan)?"Reset":$data->rLevJab->nama_jabatan',
                ),
		'no_handphone',
        array(
                'name'=>'unit_kerja',
                'value'=>'empty($data->rUnK->nama)?"Reset":$data->rUnK->nama',
                ),
		/*
		'email',
		'unit_kerja',
		'email_atasan',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
