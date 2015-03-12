<?php
// breadcrump 
$this->breadcrumbs=array(	
    "Laporan Back Office"
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){	

    $('#print_kriteria_transaksi').val($('#dailyBo_kriteria_transaksi').val());
	$('#print_from_date').val($('#dailyBo_from_date').val());	
	$('#print_to_date').val($('#dailyBo_to_date').val());	
	$('#print_nama_pegawai').val($('#dailyBo_nama_pegawai').val());	

    $('#boreport-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

if (Yii::app()->user->checkAccess('admin') || Yii::app()->user->checkAccess('approval') || Yii::app()->user->checkAccess('inputter')) {    
    $user_type = vC::APP_daily_user_approval;
} else {
    $user_type = vC::APP_daily_user_inputter;
}
?>

<h3 class="search-button"><a href="#">Kriteria Pencarian <img src = "<?php echo yii::app()->baseUrl."/images/dailymenu/filter.png"; ?>"  style="max-height: 30px;" /></a></h3>

<div class="search-form"  style="display:none">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
        'type'=>'horizontal',
    )); ?>
    
    <?php echo $form->textFieldRow($model,'nama_pegawai',array('class'=>'span3','maxlength'=>50)); ?>    
    
    <?php echo $form->dropDownListRow($model,'kriteria_transaksi', $listKriteriaTransaksi, array(
        'empty'=>'Semua Jenis Transaksi',
        'class'=>'span3',
            )); ?>
    
    
    <div class="control-group">
        <label for="proposal_periode" class="control-label">Periode (Tgl)</label>
        <div class="controls">
            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'from_date', //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>array('dateFormat'=>'dd/mm/yy',
                        'changeMonth'=>true,
                        'changeYear'=>true,
                    ),
            'htmlOptions'=>array('class'=>'span3')// jquery plugin options
            ));
        ?>
            s.d
            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('CJuiDateTimePicker',array(
            'model'=>$model, //Model object
            'attribute'=>'to_date', //attribute name
            'mode'=>'date', //use "time","date" or "datetime" (default)
            'options'=>array('dateFormat'=>'dd/mm/yy',
                        'changeMonth'=>true,
                        'changeYear'=>true,
                        //'yearRange'=>'1950:2050',
                    ),
            'htmlOptions'=>array('class'=>'span3')// jquery plugin options
            ));?>
        </div>
    </div>
    
    
    <div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'danger',
                'label'=>'Buat Laporan',
		)); ?>
    </div>
    
    <?php $this->endWidget(); ?>
</div><!-- search-form -->

<?php if ($user_type == vC::APP_daily_user_approval)  {
    $this->widget('bootstrap.widgets.TbGridView', array(
       'id'=>'boreport-grid',
       'dataProvider'=>$model->search(),	
       'type'=>'bordered striped',
       'columns'=>array(
           'nama_pegawai',
           array(
            'name'=>'Tanggal',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal)',
                ),	
           array(
               'name' => "Kriteria Transaksi",
               'value'=>'empty($data->rKrit->nama)?"Deleted":$data->rKrit->nama',
           ),  
           array (
                'name'=>'Status Trans',
                'value'=>'empty($data->rStTr->nama)?"Deleted":$data->rStTr->nama',
            ), 
           array(
            'name'=>'Total',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total, "Rp ")',
                ),	
           'info',
            array (
                'name'=>'Status',
                'value'=>'empty($data->rStat->nama)?"Deleted":$data->rStat->nama',
            ), 
           array (
                'name'=>'Approve',
                'type'=>'raw',
                'value'=>'$data->status == 1? '
                         . 'CHtml::ajaxLink("ACC", '
                                        . 'Yii::app()->createUrl("/daily/accBo", array("id" =>$data[\'daily_bo_id\'])),'
                                        . 'array ('
                                        .   '"type" => "GET",'
                                        .   '"dataType" => "json",'
                                        .   '"complete" => "'.'function(data){if(data.responseText==\'sukses update\') $.fn.yiiGridView.update(\'boreport-grid\');}'.'",'
                                            . ')'
                                            . ')'
                . ': "-"',
            ), 
            array (
                'header' => 'Action',
                'class' => 'bootstrap.widgets.TbDButtonColumn',
                'template' => '{delete}',
                'deleteButtonUrl'=>'Yii::app()->createUrl("/daily/deleteBo", array("id" =>$data[\'daily_bo_id\']))',
            )
           )	
       ));   
} else {
    $this->widget('bootstrap.widgets.TbGridView', array(
       'id'=>'boreport-grid',
       'dataProvider'=>$model->search(),	
       'type'=>'bordered striped',
       'columns'=>array(
           'nama_pegawai',
           array(
            'name'=>'Tanggal',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal)',
                ),	
           array(
               'name' => "Kriteria Transaksi",
               'value'=>'empty($data->rKrit->nama)?"Deleted":$data->rKrit->nama',
           ),  
           array (
                'name'=>'Status Trans',
                'value'=>'empty($data->rStTr->nama)?"Deleted":$data->rStTr->nama',
            ), 
           array(
            'name'=>'Total',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->total, "Rp ")',
                ),	
           'info',
            array (
                'name'=>'Status',
                'value'=>'empty($data->rStat->nama)?"Deleted":$data->rStat->nama',
            ),         
           )	
       ));
    
} 
?>


<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'csreport-print',
	'action'=>Yii::app()->createUrl('daily/printBo'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>
<input name="dailyBo[kriteria_transaksi]" id="print_kriteria_transaksi" type="hidden" />
<input name="dailyBo[from_date]" id="print_from_date" type="hidden" />
<input name="dailyBo[to_date]" id="print_to_date" type="hidden" />
<input name="dailyBo[nama_pegawai]" id="print_nama_pegawai" type="hidden" />
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

