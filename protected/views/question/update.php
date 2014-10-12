<?php
$this->breadcrumbs=array(
	'Edit Pertanyaan'
);

$this->menu=array(
	array('label'=>'Daftar Pertanyaan','url'=>array('pertanyaan')),	
);

?>
<h1 class="loginHead">Edit Pertanyaan</h1>

<?php echo $this->renderPartial('_form', array('model_soal'=>$model_soal)); ?>