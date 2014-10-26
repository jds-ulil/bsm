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

<div class="control-group">
    <label for="proposal_plafon" class="control-label">Persentase Bagi Hasil</label>
    <div class="controls">
        <input type="text" maxlength="50" id="watchlist_from_persen" name="watchlist[from_persen]" class="span3 percent">
        s.d
        <input type="text" maxlength="50" id="watchlist_to_persen" name="watchlist[to_persen]" class="span3 percent">
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
