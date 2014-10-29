<?php
$this->breadcrumbs=array(
	'Master Pertanyaan'
);

$this->menu=array(
	array('label'=>'Pertanyaan Baru','url'=>array('create')),	
	array('label'=>'Logout alert','url'=>array('logAlert')),	
);

?>


<h1 class="loginHead">Pertanyaan Kuisioner</h1>


 <?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'list-pertanyaan-grid',
	'dataProvider'=>$model_soal->search(),
	'filter'=>$model_soal,
	'filterPosition'=>'footer',
    'type'=>'bordered striped',
	'columns'=>array(
		'soal',               
                'pilihan_jawaban',
                'rank',
                array(
                'header' => 'Action',
                                'class'=>'bootstrap.widgets.TbButtonColumn',
                                'template'=>'{view}{update}{delete}',
                                'viewButtonLabel' => "Detail Proposal",
                                'viewButtonUrl'=>'Yii::app()->createUrl("/Question/view", array("id" =>$data[\'id_soal\']))',                              
                    ),
	),
)); ?>