<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->user_name=>array('view','id'=>$model->user_id),
	'Edit',
);

$this->menu=array(
	array('label'=>'Daftar User', 'url'=>array('index')),
	array('label'=>'Tambah User', 'url'=>array('create')),
	array('label'=>'Detail User', 'url'=>array('view', 'id'=>$model->user_id)),	
    array('label'=>'Manajemen User', 'url'=>array('admin')),
);
?>

<h1>Edit User #<?php echo $model->user_name; ?></h1>

<?php $this->renderPartial('_form', 
        array(
            'model'=>$model,
            'list'=>$list,
            'listAkses'=>$listAkses,
        )); ?>