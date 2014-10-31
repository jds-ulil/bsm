<?php
$this->breadcrumbs=array(
	'Wathclist Data'=>array('updateByDate&date='.$dt),
	'Baru',
);
Yii::app()->clientScript->registerScript('search', "
$(document).ready(function(){
    $('.persen').mask('##0.00');
});
");
?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#watchlist_total_tunggakan, #watchlist_plafon, #watchlist_os_pokok, #watchlist_angsuran_bulanan',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>'.',
                'decimal'=>',',
                'precision'=>2,
            )
        ));
?>
<h1 class="loginHead">Tambah Data Watchlist</h1>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'watchlist-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
)); ?>
	<?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldRow($model,'no_loan',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'nama_nasabah',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'total_tunggakan',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'kolektibilitas',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'status_tunggakan',array('class'=>'span5','maxlength'=>50)); ?>    

    <?php echo $form->labelEx($model, "tgl_bayar",  array('class'=>'control-label'));?>
    <div class="control-group">
        <div class="controls">            
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
	    $this->widget('CJuiDateTimePicker',array(
	    'model'=>$model, //Model object   
	    'attribute'=>"tgl_bayar", //attribute name
	    'mode'=>'date', //use "time","date" or "datetime" (default)
	    'options'=>
                array(
                    'dateFormat'=>'dd MM yy',
                    'changeMonth'=>true,
                    'changeYear'=>true,
                    'yearRange'=>'1950:2050',
                    ),
	    'htmlOptions'=>array('class'=>'span5')// jquery plugin options                
	    ));
            ?>
        <?php echo $form->error($model,'tgl_bayar'); ?>
        </div>    
        </div>    

    <?php echo $form->textFieldRow($model,'jenis_produk',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'no_CIF',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'no_rekening_angsuran',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'plafon',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'os_pokok',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'angsuran_bulanan',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'persentase_bagi_hasil',array('class'=>'span5 persen','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'usaha_nasabah',array('class'=>'span5','maxlength'=>50)); ?>
    <?php echo $form->textFieldRow($model,'tujuan_pembiayaan',array('class'=>'span5','maxlength'=>50)); ?>


	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'success',
			'label'=>$model->isNewRecord ? 'Simpan' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
