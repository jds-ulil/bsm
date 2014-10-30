<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
        'type'=>'horizontal',
)); ?>
<?php
        $this->widget('application.extensions.moneymask.MMask',array(
            'element'=>'#watchlist_from_plafon,#watchlist_to_plafon,#watchlist_from_os,#watchlist_to_os',
            'currency'=>'PHP',
            'config'=>array(
                'symbolStay'=>true,
                'thousands'=>',',
                'decimal'=>',00',
                'precision'=>0,
            )
        ));
?>
<div class="control-group">
    <label for="proposal_plafon" class="control-label">Plafon</label>
    <div class="controls">
        <input type="text" maxlength="50" id="watchlist_from_plafon" name="watchlist[from_plafon]" class="span3">
        s.d
        <input type="text" maxlength="50" id="watchlist_to_plafon" name="watchlist[to_plafon]" class="span3">
    </div>
    </div>
<div class="control-group">
    <label for="proposal_plafon" class="control-label">OS Pokok</label>
    <div class="controls">
        <input type="text" maxlength="50" id="watchlist_from_os" name="watchlist[from_os]" class="span3">
        s.d
        <input type="text" maxlength="50" id="watchlist_to_os" name="watchlist[to_os]" class="span3">
    </div>
    </div>

<?php echo $form->textFieldRow($model,'kolektibilitas',array('class'=>'span6','maxlength'=>50)); ?>
<?php echo $form->dropDownListRow($model,'unit_kerja', $listUnit, array(
        'empty'=>'Semua Unit Kerja',
            'class'=>'span6',
            )); ?>

<div class="control-group">
    <label for="proposal_plafon" class="control-label">Persentase Bagi Hasil</label>
    <div class="controls">
        <input type="text" maxlength="50" id="watchlist_from_persen" name="watchlist[from_persen]" class="span3 percent">
        s.d
        <input type="text" maxlength="50" id="watchlist_to_persen" name="watchlist[to_persen]" class="span3 percent">
    </div>
    </div>

<div class="control-group">
    <label for="proposal_periode" class="control-label">Periode Upload (Tgl)</label>
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
