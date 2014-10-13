<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	$mj.' Baru',
);

$this->menu=array(
	array('label'=>'Daftar '.$mj, 'url'=>array('index','id'=>$model->hak_akses)),	
);
?>  
<h1>User <?php echo $mj; ?> Baru</h1>
<?php $this->renderPartial('_form', 
        array('model'=>$model,
                'list'=>$list,             
        )); ?>    

