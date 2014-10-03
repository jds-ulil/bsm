<?php
$this->breadcrumbs=array(
	'Laporan Nasabah ditolak',
	//'Report',
);
?>
<h1>Kriteria Pencarian</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model_tolak'=>$model_tolak,
    'listTahapan' => $listTahapan,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model_tolak->search(),	
        'type'=>'bordered striped',
	'columns'=>array(	
        'tanggal_tolak',
        'no_proposal',
        'tahap_penolakan',
        'alasan_ditolak',
         array(
                'class'=>'CDataColumn',
                'name'=>'Marketing',
                'value'=>'$data->rCM->roMar->nama',
                'sortable'=>true,
                'filter'=>true,
            ),
        array(
        'header' => 'Proses',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
                        'viewButtonLabel' => "Detail Nasabah Ditolak",
                        'viewButtonUrl'=>'Yii::app()->createUrl("/tolak/detail", array("id" =>$data[\'tolak_id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )	
)); ?>