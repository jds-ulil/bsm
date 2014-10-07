<?php
    $this->breadcrumbs=array(	
	'approval',
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
<h1 class="loginHead">Approval</h1>
<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model_tolak' => $model_tolak,
    'listTahapan' => $listTahapan,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-approval-grid',
	'dataProvider'=>$model_tolak->search(),	
        'type'=>'bordered striped',
	'columns'=>array(			
                array(
               'name'=>'Tgl Penolakan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal_tolak)',
                ),
                'tahap_penolakan',
                array(
                'name'=>'Marketing',
                'value'=>'$data->rCM->roMar->nama',		
                ),
                array(
                'name'=>'Nama Nasabah',
                'value'=>'$data->rCM->nama_nasabah',		
                ),                
                array(
                'header' => 'Action',
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        'template'=>'{update}',
                        'updateButtonLabel' => "Proses Nasabah",
                        'updateButtonUrl'=>'Yii::app()->createUrl("tolak/proses", array("id" =>$data[\'tolak_id\']))',
                        'htmlOptions' => array(
                        //  'width' => '6%',
                        //  'align' => 'center',
                        ),
                    ),
            ),
        )	
); ?>