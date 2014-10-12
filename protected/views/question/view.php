<?php
$this->breadcrumbs=array(
	'Daftar Pertanyaan'=>array('index'),	
);

$this->menu=array(
	array('label'=>'Daftar Pertanyaan','url'=>array('pertanyaan')),
	array('label'=>'Pertanyaan Baru','url'=>array('create')),
	array('label'=>'Edit Pertanyaan','url'=>array('update','id'=>$model_soal->id_soal)),
	array('label'=>'Hapus Pertanyaan','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model_soal->id_soal),'confirm'=>'Are you sure you want to delete this item?')),	
);
?>

<h1>Detail Pertanyaan</h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model_soal,
	'attributes'=>array(		
		'soal',
                'pilihan_jawaban',
                'rank',
	),
)); ?>