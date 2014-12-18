<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Laporan Nasabah Potensi Masalah',
	//'Report',
);
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){		    
        $('#print_unit_kerja').val($('#naspoma_unit_kerja').val());
        $('#print_nama').val($('#naspoma_nama').val());
        $('#print_segmen').val($('#naspoma_segmen').val());
        $('#print_jenis_pembiayaan').val($('#naspoma_jenis_pembiayaan').val());
        $('#print_jenis_usaha').val($('#naspoma_jenis_usaha').val());
        $('#print_kolektibilitas_terakhir').val($('#naspoma_kolektibilitas_terakhir').val());
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
            'model' => $model,
            'listUnit' => $listUnit,       
            'listSegmen' => $listSegmen,
            'listPembiayaan' => $listPembiayaan,
            'listKolektibilitas' => $listKolektibilitas,
    )); 
    ?>
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
	'dataProvider'=>$model->search(),	
    'type'=>'bordered striped',
	'columns'=>array(	
		'nama',
        'jenis_usaha',               
        array(
            'name'=>'Segmen',
            'value'=>'empty($data->rSeg->nama)?"Deleted":$data->rSeg->nama',
        ),
        'no_rekening',        
        array(
               'name'=>'Jenis Pembiayaan',
               'value'=>'empty($data->rJen->nama)?"Deleted":$data->rJen->nama',
           ),
        array(
            'name'=>'Kolektibilitas',
            'value'=>'empty($data->rKol->nama)?"Deleted":$data->rKol->nama',
        ),
        array(
               'name'=>'Marketing',
               'value'=>'empty($data->rMar->nama)?"Deleted":$data->rMar->nama',
           ),
        array(
        'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>$template,
            'viewButtonLabel' => "Detail Proposal",
            'viewButtonUrl'=>'Yii::app()->createUrl("/naspoma/detail", array("id" =>$data[\'id\']))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
            ),
        )	
)); ?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl('naspoma/print'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>

<!----------------------searching variable--------------------------->
<input name="naspoma[unit_kerja]" id="print_unit_kerja" type="hidden" />
<input name="naspoma[nama]" id="print_nama" type="hidden" />
<input name="naspoma[segmen]" id="print_segmen" type="hidden" />
<input name="naspoma[jenis_pembiayaan]" id="print_jenis_pembiayaan" type="hidden" />
<input name="naspoma[jenis_usaha]" id="print_jenis_usaha" type="hidden" />
<input name="naspoma[kolektibilitas_terakhir]" id="print_kolektibilitas_terakhir" type="hidden" />

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
