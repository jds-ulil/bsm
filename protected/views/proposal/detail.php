<?php
$this->breadcrumbs=array(	
	'Laporan Proposal'=>Yii::app()->createUrl('proposal/report'),
    $model_proposal->no_proposal
);
?>
<h3>Proposal</h3>
 <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_proposal,
	'attributes'=>array(
                'nama_nasabah',
		array(
                'name'=>'Tgl Pengajuan',
                'value'=>Yii::app()->numberFormatter->formatDate($model_proposal->tanggal_pengajuan),
                ),
		'rSeg.nama',
		'no_proposal',                
                array(
                'name'=>'Tgl Pengajuan',
                'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->plafon,'Rp '),
                ),
		'jenis_usaha',	               
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>
<h3>Marketing</h3>
<?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_marketing,
	'attributes'=>array(
                'nama',
		'NIP',		
                'rJab.nama_jabatan',
		'no_handphone',                
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
  )); ?>


<h3>Jenis Nasabah</h3>
<?php if($model_proposal->jenis_nasabah == vc::APP_jenis_nasabah_WIC) {
        $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_proposal,
            'attributes'=>array(
                    'namaJenisNasabah',		
	),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); 
} else if ($model_proposal->jenis_nasabah == vc::APP_jenis_nasabah_existing) { 
    ?>
    <?php 
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_proposal,
            'attributes'=>array(
                    'namaJenisNasabah',
                     array(
                    'name'=>'Existing Plafon',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->existing_plafon,'Rp '),
                    ),                  
                    array(
                    'name'=>'Existing OS/Pokok',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->existing_os,'Rp '),
                    ),                    
                    array(
                    'name'=>'Existing Angsuran/Bulan',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->existing_angsuran,'Rp '),
                    ),                                          
                    'rKolEx.nama'
	),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    ));
    
} else if ($model_proposal->jenis_nasabah == vc::APP_jenis_nasabah_refferal) {
    ?>   
    <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_proposal,
            'attributes'=>array(
                    'namaJenisNasabah',		
                    'referal_alamat',		
                    'referal_telp',		
                    'referal_sektor_usaha',	
                    array(
                    'name'=>'Fasilitas',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->referal_fasilitas,'Rp '),
                    ),	
                    'rKolRef.nama',		
        ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    ));    
    }?>  

<h3>Identitas Nasabah</h3>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_ktp,
            'attributes'=>array(
                    array(
                    'name'=>'Jenis Identitas',
                    'value'=>$model_proposal->rJen->nama,
                    ),	               
                    'no_ktp',
                    'tempat_lahir',
                    array(
                    'name'=>'Tanggal Lahir',
                    'value'=>Yii::app()->numberFormatter->formatDate($model_ktp->tanggal_lahir),
                    ),        
                    'alamat',                    
                    'desa',                    
                    'rAgama.nama',                    
                    'status_perkawinan',
                    'pekerjaan',
                    'kewarganegaraan',
                    array(
                    'name'=>'Masa Berlaku',
                    'value'=>Yii::app()->numberFormatter->formatDate($model_ktp->masa_berlaku),
                    ),         
        ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    ));    
    ?>

<h4>Buku Nikah</h4>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_buku_nikah,
            'attributes'=>array(                
                    'no_buku_nikah',
                    array(
                    'name'=>'Tanggal',
                    'value'=>Yii::app()->numberFormatter->formatDate($model_buku_nikah->tgl_buku_nikah),
                    ),
        ),
    ));    
    ?>

<h4>Kartu Keluarga</h4>
<?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_proposal,
            'attributes'=>array(
                    'no_kartu_keluarga',
            ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
        ));      
?>
<?php   
    foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {    
    $index = $key+1;
    echo "<h4>Data $index</h4>";
       $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
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
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proposal-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    )); ?>
    <div class="form-actions">
        <?php  echo CHtml::link('Selesai', Yii::app()->createUrl('proposal/report'), array('class' => 'btn btn-primary'));	 ?>		
	</div>
<?php $this->endwidget(); ?>
