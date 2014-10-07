<?php
    $this->breadcrumbs=array(	
	'proses approval',
);
?>
<h1 class="loginHead">Proses Approval</h1>

<h3>Data Penolakan</h3>
 <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_tolak,
	'attributes'=>array(                
		array(
                'name'=>'Tgl Penolakan',
                'value'=>Yii::app()->numberFormatter->formatDate($model_tolak->tanggal_tolak),
                ),
		'alasan_ditolak',
		'tahap_penolakan',		               
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>

<div class="proposal-detail">
<?php $this->renderPartial('_proposal_temp',array(    
    'model_proposal' => $model_proposal,
    'model_marketing' => $model_marketing,
    'model_ktp' => $model_ktp,
    'model_buku_nikah' => $model_buku_nikah,
    'model_kartu_keluarga' => $model_kartu_keluarga,  
)); ?>
</div><!-- search-form --> 
    <div class="form-actions">        
        <?php  echo CHtml::link('Cancel Nasabah Tolak', Yii::app()->createUrl('tolak/tocancel',array('id'=>$model_tolak->tolak_id)), array('class' => 'btn btn-warning '));	 ?>		
        <?php  echo CHtml::link('Approve Nasabah Tolak', Yii::app()->createUrl('tolak/toapprove',array('id'=>$model_tolak->tolak_id)), array('class' => 'btn btn-primary'));	 ?>		
	</div>