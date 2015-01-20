<?php
// breadcrump 
$this->breadcrumbs=array(	
    "Laporan Data Security"
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});    

$('.search-form form').submit(function(){	

    $('#print_jenis_nasabah').val($('#dailySecurity_jenis_nasabah').val());
	$('#print_from_date').val($('#dailySecurity_from_date').val());	
	$('#print_to_date').val($('#dailySecurity_to_date').val());	
    
    $('#securityreport-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<h3 class="search-button"><a href="#">Kriteria Pencarian <img src = "<?php echo yii::app()->baseUrl."/images/dailymenu/filter.png"; ?>"  style="max-height: 30px;" /></a></h3>
<div class="search-form"  style="display:none">
    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'action'=>Yii::app()->createUrl($this->route),
        'method'=>'get',
        'type'=>'horizontal',
    )); ?>
    
    
    <?php echo $form->dropDownListRow($model,'jenis_nasabah', $listJenisNasabah, array(
        'empty'=>'Semua Jenis Nasabah',
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


<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'securityreport-grid',
	'dataProvider'=>$model->search(),	
        'type'=>'bordered striped',
	'columns'=>array(
            'nama_inputer',
            array (
                'name'=>'Tgl Laporan',
                'value'=>'Yii::app()->numberFormatter->formatDate($data->tanggal)',
            ),
            array (
                'name'=>'Jenis Nasabah',
                'value'=>'empty($data->rJen->nama)?"Deleted":$data->rJen->nama',
            ),
            'jumlah',
            'info',
        )	
)); ?>



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'securityreport-print',
	'action'=>Yii::app()->createUrl('daily/printsecurity'),
	'method'=>'post',        
        'type'=>'horizontal',
        'htmlOptions'=> array(
            'target'=>"_blank",
        )
)); ?>
<input name="dailySecurity[jenis_nasabah]" id="print_jenis_nasabah" type="hidden" />
<input name="dailySecurity[from_date]" id="print_from_date" type="hidden" />
<input name="dailySecurity[to_date]" id="print_to_date" type="hidden" />
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