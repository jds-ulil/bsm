<?php
$this->breadcrumbs=array(
	'List Emails'=>array('index'),
	$model->id_list_email,
);
if (Yii::app()->user->checkAccess('inputter')) {
    $this->menu=array(
	    array('label'=>'Daftar List Email','url'=>array('index')),
	    array('label'=>'Tambah Email','url'=>array('create')),	    
    );
} else if(Yii::app()->user->checkAccess('approval')) {
    $this->menu=array(
	array('label'=>'Daftar List Email','url'=>array('index')),
	array('label'=>'Tambah Email','url'=>array('create')),
	array('label'=>'Edit Email','url'=>array('update','id'=>$model->id_list_email)),
    );
} else if(Yii::app()->user->checkAccess('admin')) {
    $this->menu=array(
	array('label'=>'Daftar List Email','url'=>array('index')),
	array('label'=>'Tambah Email','url'=>array('create')),
	array('label'=>'Edit Email','url'=>array('update','id'=>$model->id_list_email)),
	array('label'=>'Hapus Email','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_list_email),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manajemen List Email','url'=>array('admin')),
    );
}
?>

<h1>Detail Email #<?php echo $model->nama_pengguna; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		//'id_list_email',
		'email_address',
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
