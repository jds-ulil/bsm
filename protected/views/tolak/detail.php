<?php
    $this->breadcrumbs=array(	
	'Detail Nasabah Tolak',
);
?>
<h1 class="loginHead">Nasabah Ditolak</h1>

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