<?php
$this->breadcrumbs=array(
	'Rekap Quistionaire',
);
?>
<!--<h1 class="loginHead">Kriteria</h1>-->
<?php //echo $this->renderPartial('_search', array('model_jawab'=>$model_jawab)); ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'unitkerja-grid',
	'dataProvider'=>$model_jawab->searchReport(),
	//'filter'=>$model,
	'filterPosition'=>'footer',
	'columns'=>array(			
	),
)); ?>
