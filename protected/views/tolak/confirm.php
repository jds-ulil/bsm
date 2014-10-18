<?php
$this->breadcrumbs=array(	
	'Konfirmasi Nasabah Ditolak',
);
Yii::app()->clientScript->registerScript('cancel', "
$('.btn-info').click(function(){
        $('#tolak_mode').val('create');  
        $('#tolak-form').submit();
	return false;
});
");
?>
<h3>Data Penolakan Nasabah</h3>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
        'id'=>'tolak-form',
        'enableAjaxValidation'=>false,
        'type'=>'horizontal',
    )); ?>
    
    <?php echo $form->hiddenField($model_tolak, 'tanggal_tolak'); ?>
    <?php echo $form->hiddenField($model_tolak, 'proposal_id'); ?>
    <?php echo $form->hiddenField($model_tolak, 'nama_nasabah'); ?>
    <?php echo $form->hiddenField($model_tolak, 'alasan_ditolak'); ?>
    <?php echo $form->hiddenField($model_tolak, 'tahap_penolakan'); ?>
    <?php echo $form->hiddenField($model_tolak, 'tempLL'); ?>     
    <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_tolak,
	'attributes'=>array(
        array(
            'name'=>'Nama Nasabah',
            'value'=>$model_proposal->nama_nasabah,
            ),
        array(
                'name'=>'Tgl Penolakan',
                'value'=>Yii::app()->numberFormatter->formatDate($model_tolak->tanggal_tolak),
                ),		
		//'proposal_id',
                'alasan_ditolak',
		'tahap_penolakan',		
	),
          'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>

<h3>Data Proposal</h3>

     <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_proposal,
	'attributes'=>array(
        array(
            'name'=>'Tgl Pengajuan',
            'value'=>Yii::app()->numberFormatter->formatDate($model_proposal->tanggal_pengajuan),
            ),	
        array(
            'name'=>'Plafon Pengajuan',
            'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->plafon,'Rp '),
            ),	
		'rSeg.nama',
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
                    array (
                    'name'=>'Existing OS/Pokok',
                    'value'=>Yii::app()->numberFormatter->formatCurrency($model_proposal->existing_os,'Rp '),
                    ),                  
                    array (
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
                    array (
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
          'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
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
                    array(
                    'name'=>'Tgl Kartu Keluarga',
                    'value'=>Yii::app()->numberFormatter->formatDate($model_proposal->tanggal_kartu_keluarga),
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


    <?php echo $form->hiddenField($model_tolak, 'mode', array('value'=>'complete')); ?>
    <div class="form-actions">
                <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Simpan',
		)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'cancel',
			'type'=>'info',
			'label'=>'Batal',
		)); ?>		
	</div>

<?php $this->endWidget(); ?>
