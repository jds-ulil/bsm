<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Laporan Proposal Pembiayaan Baru',
	//'Report',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){	
	$('#print_marketing').val($('#proposal_marketing').val());
	$('#print_status_pengajuan').val($('#proposal_status_pengajuan').val());
	$('#print_segmen').val($('#proposal_segmen').val());
	$('#print_jenis_usaha').val($('#proposal_jenis_usaha').val());
	$('#print_from_plafon').val($('#proposal_from_plafon').val());
	$('#print_to_plafon').val($('#proposal_to_plafon').val());
	$('#print_from_date').val($('#proposal_from_date').val());
	$('#print_to_date').val($('#proposal_to_date').val());
	$('#print_to_unit_kerja').val($('#proposal_unit_kerja').val());
    $('#mtb-proposal-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="loginHead">Kriteria Pencarian</h1>
<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model_proposal'=>$model_proposal,
        'listSegmen' => $listSegmen,
        'listPengajuan' => $listPengajuan,
        'listUnit' => $listUnit,
)); ?>
</div><!-- search-form -->

<?php
if(Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('approval')) {
$template = "{view}{delete}";
} else {
    $template = "{view}";
}
?>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'mtb-proposal-grid',
	'dataProvider'=>$model_proposal->search(),	
        'type'=>'bordered striped',
	'columns'=>array(	
		'nama_nasabah',		
		 array(
               'name'=>'Tgl Pengajuan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal_pengajuan)',
                ),		
                array(
                'name'=>'Plafon',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->plafon, "Rp ")',
                ),
                'jenis_usaha',
         array(
                'name'=>'Marketing',
                'value'=>'empty($data->rMar->nama)?"Deleted":$data->rMar->nama',
            ),
         array(
                'name'=>'Status',
                'value'=>'empty($data->rStat->nama)?"Deleted":$data->rStat->nama',
            ),
//              //  'plafon',
//        array(
//            'name'=>'Plafon',
//            'value'=>'Yii::app()->numberFormatter->formatCurrency($data->plafon, "IDR")',
//        ),      
        array(
        'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>$template,
            'viewButtonLabel' => "Detail Proposal",
            'viewButtonUrl'=>'Yii::app()->createUrl("/proposal/detail", array("id" =>$data[\'proposal_id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )	
)); ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl('proposal/print'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>
<input name="proposal[unit_kerja]" id="print_to_unit_kerja" type="hidden" />
<input name="proposal[marketing]" id="print_marketing" type="hidden" />
<input name="proposal[status_pengajuan]" id="print_status_pengajuan" type="hidden" />
<input name="proposal[segmen]" id="print_segmen" type="hidden" />
<input name="proposal[jenis_usaha]" id="print_jenis_usaha" type="hidden" />
<input name="proposal[to_plafon]" id="print_to_plafon" type="hidden" />
<input name="proposal[from_plafon]" id="print_from_plafon" type="hidden" />
<input name="proposal[from_date]" id="print_from_date" type="hidden" />
<input name="proposal[to_date]" id="print_to_date" type="hidden" />
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
