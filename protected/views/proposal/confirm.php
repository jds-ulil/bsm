<?php
$this->breadcrumbs=array(	
	'Konfirmasi Proposal',
);
Yii::app()->clientScript->registerScript('cancel', "
$('.btn-info').click(function(){
        $('#proposal_mode').val('create');  
        $('#proposal-form').submit();
	return false;
});
");
?>
<h3>Data Proposal</h3>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'proposal-form',
	'enableAjaxValidation'=>false,
    'type'=>'horizontal',
    )); ?>
    <?php echo $form->hiddenField($model_proposal, 'tanggal_pengajuan'); ?>
    <?php echo $form->hiddenField($model_proposal, 'segmen'); ?>
    <?php echo $form->hiddenField($model_proposal, 'plafon'); ?>
    <?php echo $form->hiddenField($model_proposal, 'no_proposal'); ?>
    <?php echo $form->hiddenField($model_proposal, 'jenis_usaha'); ?>
    
    <?php  $this->widget('bootstrap.widgets.TbDetailView',array(
	'type'=>'striped',
	'data'=>$model_proposal,
	'attributes'=>array(
		'tanggal_pengajuan',
		'rSeg.nama',
		'no_proposal',
                'plafon',
		'jenis_usaha',	               
	),
        'htmlOptions'=>array(
            'class'=>'detail-view resize-table',
        ),
    )); ?>


<h3>Marketing</h3>
    <?php echo $form->hiddenField($model_proposal, 'marketing'); ?>
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
<?php echo $form->hiddenField($model_proposal, 'jenis_nasabah'); ?>
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
    <?php echo $form->hiddenField($model_proposal, 'existing_plafon'); ?>
    <?php echo $form->hiddenField($model_proposal, 'existing_os'); ?>
    <?php echo $form->hiddenField($model_proposal, 'existing_angsuran'); ?>
    <?php echo $form->hiddenField($model_proposal, 'existing_kolektabilitas'); ?>
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
     <?php echo $form->hiddenField($model_proposal, 'referal_nama'); ?>     
     <?php echo $form->hiddenField($model_proposal, 'referal_alamat'); ?>     
     <?php echo $form->hiddenField($model_proposal, 'referal_telp'); ?>     
     <?php echo $form->hiddenField($model_proposal, 'referal_sektor_usaha'); ?>     
     <?php echo $form->hiddenField($model_proposal, 'referal_fasilitas'); ?>     
     <?php echo $form->hiddenField($model_proposal, 'referal_kolektabilitas'); ?>     
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
    <?php echo $form->hiddenField($model_proposal, 'no_ktp'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'no_ktp'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'tempat_lahir'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'tanggal_lahir'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'alamat'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'desa'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'agama'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'status_perkawinan'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'pekerjaan'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'kewarganegaraan'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'masa_berlaku'); ?> 
    <?php echo $form->hiddenField($model_ktp, 'no_proposal'); ?> 
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
    <?php echo $form->hiddenField($model_proposal, 'no_buku_nikah'); ?> 
    <?php echo $form->hiddenField($model_buku_nikah, 'no_buku_nikah'); ?> 
    <?php echo $form->hiddenField($model_buku_nikah, 'tgl_buku_nikah'); ?> 
    <?php echo $form->hiddenField($model_buku_nikah, 'no_proposal'); ?> 
    <?php
    $this->widget('bootstrap.widgets.TbDetailView',array(
            'type'=>'striped',
            'data'=>$model_buku_nikah,
            'attributes'=>array(
                    'no_buku_nikah',
                    'tgl_buku_nikah',                    
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
    echo $form->hiddenField($model_proposal, 'no_kartu_keluarga');
    foreach ($model_kartu_keluarga as $key => $model_kartu_keluargaEach) {
    if ($model_kartu_keluargaEach->nama != '' || $model_kartu_keluargaEach->tanggal_lahir != ''
            || $model_kartu_keluargaEach->no_ktp != '') {
    echo CHtml::hiddenField("proposalKartuKeluarga[$key][no_kartu_keluarga]" , $model_kartu_keluargaEach->no_kartu_keluarga, array('id' => "proposalKartuKeluarga[$key][no_kartu_keluarga]"));        
    echo CHtml::hiddenField("proposalKartuKeluarga[$key][nama]" , $model_kartu_keluargaEach->nama, array('id' => "proposalKartuKeluarga[$key][nama]"));        
    echo CHtml::hiddenField("proposalKartuKeluarga[$key][tanggal_lahir]" , $model_kartu_keluargaEach->tanggal_lahir, array('id' => "proposalKartuKeluarga[$key][tanggal_lahir]"));        
    echo CHtml::hiddenField("proposalKartuKeluarga[$key][no_ktp]" , $model_kartu_keluargaEach->no_ktp, array('id' => "proposalKartuKeluarga[$key][no_ktp]"));        
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
 }
?>

    <?php echo $form->hiddenField($model_proposal, 'mode', array('value'=>'complete')); ?>
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
<?php $this->endwidget(); ?>