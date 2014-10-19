<?php
    $this->breadcrumbs=array(	
	'proses approval',
);
?>
<h1 class="loginHead">Proses Approval</h1>

<h3>Data Pelunasan</h3>
 <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_pelunasan,
	'attributes'=>array(
                array(
                'name'=>'Tgl Pelunasan',
                'value'=>Yii::app()->numberFormatter->formatDate($model_pelunasan->tanggal_pelunasan),
                ),
                'nama_nasabah',
                'alamat_nasabah',
                'rSeg.nama',
                'penyebab',
                'rJen.nama',
                'jenis_usaha',
                'no_CIF',
                'no_rekening',
                array(
                'name'=>'plafon_awal',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model_pelunasan->plafon_awal,''),
                ),
                array(
                'name'=>'OS_pokok_terakhir',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model_pelunasan->OS_pokok_terakhir,''),
                ),
                array(
                'name'=>'angsuran',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model_pelunasan->angsuran,''),
                ),
                'rKol.nama',
                'margin',
                array(
                'name'=>'tunggakan_terakhir',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model_pelunasan->tunggakan_terakhir,''),
                ),
            
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>

    <div class="form-actions">        
        <?php  echo CHtml::link('Hapus Pelunasan', Yii::app()->createUrl('pelunasan/tocancel',array('id'=>$model_pelunasan->pelunasan_id)), array('class' => 'btn btn-warning '));	 ?>		
        <?php  echo CHtml::link('Approve Pelunasan', Yii::app()->createUrl('pelunasan/toapprove',array('id'=>$model_pelunasan->pelunasan_id)), array('class' => 'btn btn-primary'));	 ?>		
	</div>