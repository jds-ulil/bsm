<?php
$this->breadcrumbs=array(
	'Laporan Watchlist',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){	

    $('#print_from_plafon').val($('#watchlist_from_plafon').val());
    $('#print_to_plafon').val($('#watchlist_to_plafon').val());
    $('#print_from_os').val($('#watchlist_from_os').val());
    $('#print_to_os').val($('#watchlist_to_os').val());
    $('#print_kolektibilitas').val($('#watchlist_kolektibilitas').val());
    $('#print_from_persen').val($('#watchlist_from_persen').val());
    $('#print_to_persen').val($('#watchlist_to_persen').val());
    $('#print_from_date').val($('#watchlist_from_date').val());
	$('#print_to_date').val($('#watchlist_to_date').val());
    $('#print_unit_kerja').val($('#watchlist_unit_kerja').val());
    $('#print_status_tunggakan').val($('#watchlist_status_tunggakan').val());

    $('#mtb-proposal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
    });
$(document).ready(function(){
    $('.percent').mask('##0.00');
});
");
?>

<h1 class="loginHead">Kriteria Pencarian</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
    'listUnit'=>$listUnit,
)); ?>
</div><!-- search-form -->
<?php echo CHtml::beginForm(); ?>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model->search(),	
    'selectableRows' => 2,
    'type'=>'bordered striped',
	'columns'=>array(	
            array(
                'id' => 'selectedIds',
                'class' => 'CCheckBoxColumn',
                'footer' =>  CHtml::submitButton('Hapus', 
                        array('name' => 'DeleteButton',
                            'confirm' => 'Anda yakin menghapus data ini?')),
            ),
            'nama_nasabah',
            'kolektibilitas',              
             array(
                'name'=>'OS Pokok',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->os_pokok, "Rp ")',
                ),            
            'no_rekening_angsuran',
            array(
                'name'=>'Total Tunggakan',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total_tunggakan, "Rp ")',
                ),            
            array(
            'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}{delete}',
                        'viewButtonLabel' => "Detail Watchlist Data",
                        'viewButtonUrl'=>'Yii::app()->createUrl("/watch/detail", array("id" =>$data[\'watchlist_id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )	
)); ?>
<?php echo CHtml::endForm(); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl('watch/print'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>
<input name="watchlist[from_plafon]" id="print_from_plafon" type="hidden" />
<input name="watchlist[to_plafon]" id="print_to_plafon" type="hidden" />
<input name="watchlist[from_os]" id="print_from_os" type="hidden" />
<input name="watchlist[to_os]" id="print_to_os" type="hidden" />
<input name="watchlist[kolektibilitas]" id="print_kolektibilitas" type="hidden" />
<input name="watchlist[from_persen]" id="print_from_persen" type="hidden" />
<input name="watchlist[to_persen]" id="print_to_persen" type="hidden" />
<input name="watchlist[unit_kerja]" id="print_unit_kerja" type="hidden" />
<input name="watchlist[from_date]" id="print_from_date" type="hidden" />
<input name="watchlist[to_date]" id="print_to_date" type="hidden" />
<input name="watchlist[status_tunggakan]" id="print_status_tunggakan" type="hidden" />
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
