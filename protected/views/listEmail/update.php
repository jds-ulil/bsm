<?php
$this->breadcrumbs=array(
	'List Emails'=>array('index'),
	$model->id_list_email=>array('view','id'=>$model->id_list_email),
	'Update',
);

$this->menu=array(
	array('label'=>'List Email','url'=>array('index')),
	array('label'=>'Tambah Email','url'=>array('create')),
	array('label'=>'Lihat Detail','url'=>array('view','id'=>$model->id_list_email)),
	//array('label'=>'Manajemen List Email','url'=>array('admin')),
);
?>

<h1>Edit Email data #<?php echo $model->nama_pengguna; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model,'list'=>$list,'listNotif'=>$listNotif,)); ?>