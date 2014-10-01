<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	$mj =>array('index','id'=>$model->hak_akses),
	$model->user_name=>array('view','id'=>$model->user_id),
	'Edit',
);

$this->menu=array(
        array('label'=>'Daftar '.$mj, 'url'=>array('index', 'id'=>$model->hak_akses)),
	array('label'=>'Tambah '.$mj, 'url'=>array('create', 'id'=>$model->hak_akses)),
	array('label'=>'Detail User', 'url'=>array('view', 'id'=>$model->user_id)),		
);
?>

<h1>Edit User #<?php echo $model->user_name; ?></h1>

<?php $this->renderPartial('_form', 
        array(
            'model'=>$model,
            'list'=>$list,            
        )); ?>