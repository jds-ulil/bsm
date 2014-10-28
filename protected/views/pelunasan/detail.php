<?php
$this->breadcrumbs=array(	
	'Laporan Pelunasan'=>Yii::app()->createUrl('pelunasan/report'),
    $model_pelunasan->nama_nasabah
);
?>
<BR />
 <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_pelunasan,
    'header'=>'DATA PELUNASAN',
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
