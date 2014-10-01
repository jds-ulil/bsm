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
    <?php echo $form->hiddenField($model_tolak, 'no_proposal'); ?>
    <?php echo $form->hiddenField($model_tolak, 'alasan_ditolak'); ?>
    <?php echo $form->hiddenField($model_tolak, 'tahap_penolakan'); ?>
    <?php echo $form->hiddenField($model_tolak, 'tempLL'); ?>     
    <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_tolak,
	'attributes'=>array(
		'tanggal_tolak',		
		'no_proposal',
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
		'tanggal_pengajuan',		
		'plafon',
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
		'NIP',
		'nama',
                'rJab.nama_jabatan',
		'no_handphone',
                'email',
                'email_atasan',		
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
                    'existing_plafon',
                    'existing_os',
                    'existing_angsuran',
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
                    'referal_fasilitas',		
                    'rKolRef.nama',		
        ),
          'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    ));    
    }?>   


<h3>Data Nasabah</h3>
<h4>Kartu Tanda Penduduk</h4>
    <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_ktp,
            'attributes'=>array(
                    'no_ktp',
                    'tempat_lahir',
                    'tanggal_lahir',
                    'alamat',                    
                    'desa',                    
                    'rAgama.nama',                    
                    'status_perkawinan',
                    'pekerjaan',
                    'kewarganegaraan',
                    'masa_berlaku',
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
                    'tgl_buku_nikah',                    
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
            ),
            'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
        ));      
?>
<?php   
    foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {    
    echo "<h4>Data </h4>";
       $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_kartu_keluargaEach,
            'attributes'=>array(
                    //'no_kartu_keluarga',
                    'nama',                    
                    'no_ktp',                    
                    'tanggal_lahir',                    
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
