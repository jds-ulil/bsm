<?php
$this->breadcrumbs=array(	
	'Laporan Nasabah Potensi Masalah'=>Yii::app()->createUrl('naspoma/report'),
    $model->nama
);
?>

<BR />
 <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model,
    'header'=>'DATA',
	'attributes'=>array(                
                'nama',                            
                'rSeg.nama',
                'alasan',
                'rJen.nama',
                'jenis_usaha',
                'no_CIF',
                'no_rekening',
                array(
                    'name'=>'plafon_awal',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model->plafon_awal,''),                    
                ),
                array(
                    'name'=>'OS_pokok_terakhir',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model->OS_pokok_terakhir,''),                    
                ),
                array(
                    'name'=>'angs_per_hasil',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model->angs_per_hasil,''),                    
                ),
                'rKol.nama',
                'margin',
                array(
                    'name'=>'tunggakan',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model->tunggakan,''),                    
                ),
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>

<!---------------------IDENTITAS NASABAH------------------>
 <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model,
            'header'=>'IDENTITAS NASABAH',
            'attributes'=>array(
                    array(
                    'name'=>'Jenis Identitas',
                    'value'=>$model->rJen->nama,
                    ),	               
                    'no_identitas',
                    'tempat_lahir',
                    array(
                    'name'=>'Tanggal Lahir',
                    'value'=>Yii::app()->numberFormatter->formatDate($model->tanggal_lahir),
                    ),        
                    'alamat',                    
                    'desa',                    
                    'rAgama.nama',                    
                    'status_perkawinan',
                    'pekerjaan',
                    'kewarganegaraan',
                    array(
                    'name'=>'Masa Berlaku',
                    'value'=>Yii::app()->numberFormatter->formatDate($model->masa_berlaku),
                    ),         
        ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    ));    
    ?>


<!---------------------BUKU NIKAH------------------>

 <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model,
            'header'=>'BUKU NIKAH',
            'attributes'=>array(                
                    'no_buku_nikah',
                    array(
                    'name'=>'Tanggal',
                    'value'=>Yii::app()->numberFormatter->formatDate($model->tgl_buku_nikah),
                    ),
        ),
    ));    
    ?>


<!---------------------KARTU KELUARGA------------------>
<?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model,
            'header'=>'KARTU KELUARGA',
            'attributes'=>array(
                    'no_kartu_keluarga',
                    array(
                    'name'=>'Tanggal KK',
                    'value'=>Yii::app()->numberFormatter->formatDate($model->tgl_kartu_keluarga),
                    ),
            ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
        ));      
?>
<?php   
    foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {    
    $index = $key+1;    
       $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'header'=>'Data '.$index,
            'data'=>$model_kartu_keluargaEach,
            'attributes'=>array(
                    //'no_kartu_keluarga',
                    'nama',  
                    array(
                    'name'=>'Tempat/Tgl Lahir',
                    'value'=>$model_kartu_keluargaEach->tempat_lahir .'  '. Yii::app()->numberFormatter->formatDate($model_kartu_keluargaEach->tanggal_lahir),
                    ),
                    'no_ktp',                                        
            ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
        ));      
 }
 ?>


<!---------------------Finish BUTTON------------------>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proposal-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    )); ?>
    <div class="form-actions">
        <?php  echo CHtml::link('Selesai', Yii::app()->createUrl('naspoma/report'), array('class' => 'btn btn-success'));	 ?>		
	</div>
<?php $this->endwidget(); ?>