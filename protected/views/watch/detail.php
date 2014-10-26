<?php
    $this->breadcrumbs=array(	
        'Laporan'=>array('watch/report'),
	'Detail Watchlist',
);
?>
<h1 class="loginHead">Watchlist</h1>
 <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model,
	'attributes'=>array(                
            'no_loan',
            'nama_nasabah',            
            array(
                'name'=>'Total Tunggakan',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model->total_tunggakan,'Rp '),
                ),
            'kolektibilitas',
            'jenis_produk',
            'no_CIF',
            'no_rekening_angsuran',            
            array(
                'name'=>'Plafon',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model->plafon,'Rp '),
                ),
            array(
                'name'=>'OS Pokok',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model->os_pokok,'Rp '),
                ),
            array(
                'name'=>'Angsuran Bulanan',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model->angsuran_bulanan,'Rp '),
                ),                        
            'persentase_bagi_hasil',
            'usaha_nasabah',
            'tujuan_pembiayaan',
            
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>
