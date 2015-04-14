<?php
$this->breadcrumbs=array(
	'Setting KCP',
);
?>

<h2 class="loginHead">Nama KCP</h2>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'kolektabilitas-grid',
	'dataProvider'=>$model->search(),	
    'type'=>'bordered striped',	
	'columns'=>array(
		//'kolektabilitas_id',
		'nama',		
		array(
        'header' => 'Action',	
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>"{update}",
            'viewButtonLabel' => "Edit Nama",
            ),
	),
)); ?>
