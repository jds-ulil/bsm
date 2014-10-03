<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Laporan Proposal Pembiayaan Baru',
	//'Report',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#mtb-proposal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kriteria Pencarian</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model_proposal'=>$model_proposal,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model_proposal->search(),	
        'type'=>'bordered striped',
	'columns'=>array(	
		'no_proposal',		
		'tanggal_pengajuan',		
         array(
                'name'=>'Marketing',
                'value'=>'$data->rMar->nama',		
            ),
              //  'plafon',
        array(
            'name'=>'Plafon',
            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->plafon, "IDR")',
        ),
        array(
        'header' => 'Proses',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
                        'viewButtonLabel' => "Detail Proposal",
                        'viewButtonUrl'=>'Yii::app()->createUrl("/proposal/detail", array("id" =>$data[\'proposal_id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )	
)); ?>