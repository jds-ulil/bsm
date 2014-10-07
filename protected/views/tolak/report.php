<?php
$this->breadcrumbs=array(
	'Laporan Nasabah ditolak',
	//'Report',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#mtb-approval-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<h1>Kriteria Pencarian</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model_tolak'=>$model_tolak,
    'listTahapan' => $listTahapan,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-approval-grid',
	'dataProvider'=>$model_tolak->searchTolak(),	
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
                        'updateButtonLabel' => "Detail",
                        'updateButtonUrl'=>'Yii::app()->createUrl("tolak/detail", array("id" =>$data[\'tolak_id\']))',
                        'htmlOptions' => array(
                        //  'width' => '6%',
                        //  'align' => 'center',
                        ),
                    ),
            ),
        )	
); ?>