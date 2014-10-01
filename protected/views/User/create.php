<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Buat Baru',
);

$this->menu=array(
	array('label'=>'Daftar User', 'url'=>array('index')),
	array('label'=>'Manajemen User', 'url'=>array('admin')),
);
?>  
<h1>Buat User</h1>
<?php $this->renderPartial('_form', 
        array('model'=>$model,
                'list'=>$list,
                'listAkses'=>$listAkses,
        )); ?>    

