<?php
$this->breadcrumbs=array(
	'Laporan Pelunasan Tidak Normal/Strange',
	//'Report',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){    
	$('#print_no_rekening').val($('#pelunasan_no_rekening').val());
	$('#print_nama_nasabah').val($('#pelunasan_nama_nasabah').val());
	$('#print_to_date').val($('#pelunasan_to_date').val());
        $('#print_from_date').val($('#pelunasan_from_date').val());
        
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
	'model_pelunasan'=>$model_pelunasan,
        'report'=>true,
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
                            'updateButtonLabel' => "Detail",
                            'updateButtonUrl'=>'Yii::app()->createUrl("pelunasan/detail", array("id" =>$data[\'pelunasan_id\']))',
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
<input name="pelunasan[no_rekening]" id="print_no_rekening" type="hidden" />
<input name="pelunasan[nama_nasabah]" id="print_nama_nasabah" type="hidden" />
<input name="pelunasan[from_date]" id="print_from_date" type="hidden" />
<input name="pelunasan[to_date]" id="print_to_date" type="hidden" />
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