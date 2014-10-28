<?php
$this->breadcrumbs=array(
	'List Emails'=>array('index'),
	$model->id_list_email,
);
$this->menu=array(
    array('label'=>'Daftar List Email','url'=>array('index')),
    array('label'=>'Email Baru','url'=>array('create')),
    array('label'=>'Edit Email','url'=>array('update','id'=>$model->id_list_email)),
    array('label'=>'Hapus Email','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_list_email),'confirm'=>'Are you sure you want to delete this item?')),
    //array('label'=>'Manajemen List Email','url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
    'header'=>"DETAIL EMAIL",
	'attributes'=>array(
		//'id_list_email',
		'email_address',
                'NIP',
		'nama_pengguna',
		'rJab.nama_jabatan',
        'rNot.nama',
//		array(
//            'name'=>'status',
//            'type'=>'html',
//            'value'=>$model->getStatus($model->status),
//                ),
	),
)); ?>
