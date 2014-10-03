<?php
$this->breadcrumbs=array(	
	'Laporan Nasabah Ditolak'=>Yii::app()->createUrl('tolak/report'),
    //$model_proposal->no_proposal
);
?>
<h3>Data Nasabah Tolak</h3>
 
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proposal-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    )); ?>
    <div class="form-actions">
        <?php  echo CHtml::link('Selesai', Yii::app()->createUrl('tolak/report'), array('class' => 'btn btn-primary'));	 ?>		
	</div>
<?php $this->endwidget(); ?>
