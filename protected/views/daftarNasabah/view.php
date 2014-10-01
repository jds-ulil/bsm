<?php
$this->breadcrumbs=array(
	'Daftar Nasabah'=>array('index'),
	$model->nama,
);

if ( Yii::app()->user->checkAccess('admin') ) {
$this->menu=array(
	array('label'=>'List Daftar Nasabah','url'=>array('index')),
	array('label'=>'Tambah Nasabah','url'=>array('create')),
	array('label'=>'Edit Data Nasabah','url'=>array('update','id'=>$model->nasabah_id)),
	array('label'=>'Hapus Data','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->nasabah_id),'confirm'=>'Are you sure you want to delete this item?')),	
	array('label'=>'Manajemen Daftar Nasabah','url'=>array('admin')),
);
} else if ( Yii::app()->user->checkAccess('otor') ) {
$this->menu=array(
	array('label'=>'List Daftar Nasabah','url'=>array('index')),
	array('label'=>'Tambah Nasabah','url'=>array('create')),
	array('label'=>'Edit Data Nasabah','url'=>array('update','id'=>$model->nasabah_id)),
);
} else {
$this->menu=array(
	array('label'=>'Tambah Nasabah','url'=>array('create')),
);    
}


?>

<h1>View DaftarNasabah #<?php echo $model->nama; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'nasabah_id',
		'kartukeluarga_id',
		'nama',
		'alamat',
		'sNas.nama_status',
	),
)); ?>
<?php 
    if($model->status == 1) {
        ?>
        
        <div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'link',
			'url'=>array('apply','id'=>$model->nasabah_id),
			'type'=>'primary',
			'label'=>'Apply',
		)); ?>		
        </div>

        <?php
    }
?>
