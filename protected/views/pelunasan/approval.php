<?php
$this->breadcrumbs=array(	
	'Approval Pelunasan Tidak Normal',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#mtb-approval-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<h1 class="loginHead">Approval Pelunasan</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model_pelunasan' => $model_pelunasan,
    'report'=>false,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-approval-grid',
	'dataProvider'=>$model_pelunasan->search(),	
        'type'=>'bordered striped',
	'columns'=>array(	
             array(
               'name'=>'Tgl Pelunasan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal_pelunasan)',
                ),            
            'nama_nasabah',
            'no_rekening',
            'penyebab',
             array(
                'header' => 'Action',
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}',
                        'updateButtonLabel' => "Proses Nasabah",
                        'updateButtonUrl'=>'Yii::app()->createUrl("pelunasan/proses", array("id" =>$data[\'pelunasan_id\']))',
                        'htmlOptions' => array(
                        //  'width' => '6%',
                        //  'align' => 'center',
                        ),
                    ),
            ),
        )	
); ?>