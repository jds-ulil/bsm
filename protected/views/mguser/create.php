<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Tambah '.$mj,
);

$this->menu=array(
	array('label'=>'Daftar '.$mj, 'url'=>array('index','id'=>$model->hak_akses)),	
);
?>  
<h1>Tambah <?php echo $mj; ?></h1>
<?php $this->renderPartial('_form', 
        array('model'=>$model,
                'list'=>$list,             
        )); ?>    

