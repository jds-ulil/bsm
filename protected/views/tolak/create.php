<?php
/* @var $this MtbUserController */
/* @var $model MtbUser */

$this->breadcrumbs=array(
	'Input Nasabah Ditolak' 
);
?>
<h1 class="loginHead">Input Nasabah Ditolak</h1>

<?php echo $this->renderPartial('_form', 
        array(
            'model_tolak'=>$model_tolak,            
            'listTahapan'=>$listTahapan,            
        )); ?>
