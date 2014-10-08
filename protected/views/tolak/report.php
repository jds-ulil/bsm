<?php
$this->breadcrumbs=array(
	'Laporan Nasabah ditolak',
	//'Report',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
    $('#print_marketing').val($('#tolak_marketing_search').val());
	$('#print_tahap').val($('#tolak_tahap_penolakan').val());
	$('#print_nasabah').val($('#tolak_nama_nasabah').val());
	$('#print_from_date').val($('#tolak_from_date').val());
	$('#print_to_date').val($('#tolak_to_date').val());
	$('#mtb-approval-grid').yiiGridView('update', {
		data: $(this).serialize()
	});  
	return false;
});
");

?>
<h1 class="loginHead">Kriteria Pencarian</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model_tolak'=>$model_tolak,
    'listTahapan' => $listTahapan,
    'report'=> $report,
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


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl('tolak/print'),
	'method'=>'post',        
    'type'=>'horizontal',
    'htmlOptions'=> array(
        'target'=>"_blank",
    )
)); ?>
<input name="tolak[marketing_search]" id="print_marketing" type="hidden" />
<input name="tolak[tahap_penolakan]" id="print_tahap" type="hidden" />
<input name="tolak[nama_nasabah]" id="print_nasabah" type="hidden" />
<input name="tolak[from_date]" id="print_from_date" type="hidden" />
<input name="tolak[to_date]" id="print_to_date" type="hidden" />
<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'danger',
                'label'=>'Cetak Laporan',
		)); ?>
    </div>
<?php
    $this->endWidget();
?>