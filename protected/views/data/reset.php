<?php
$this->breadcrumbs=array(
	'Clean Data',
);
?>
<h4>Data - Data Berikut Akan Di kosongkan !!!</h4>
<ul>
    <li>
       Proposal Baru 
    </li>
    <li>
       Daftar Nasabah Ditolak
    </li>
    <li>
       Watchlist Akhir Bulan
    </li>
    <li>
       Pelunasan Tidak Normal
    </li>
    <li>
       Kuisioner
    </li>
</ul>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . ' alert alert-success">' . $message . "</div>\n";
    }
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'proposal-print',
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'post',                    
)); ?>
<input name="reset" type="hidden" value="1" />

<div class="form-actions">        	
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                'buttonType'=>'submit',                
                'type'=>'warning',
                'label'=>'Clean',
		)); ?>
    </div>
<?php
    $this->endWidget();
?>
