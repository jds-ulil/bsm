<?php
$this->breadcrumbs=array(
	'Pertanyaan Baru'
);

$this->menu=array(
	array('label'=>'Daftar Pertanyaan','url'=>array('pertanyaan')),	
);

?>
<h1 class="loginHead">Pertanyaan Baru</h1>

<?php echo $this->renderPartial('_form', array('model_soal'=>$model_soal)); ?>