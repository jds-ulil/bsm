<?php
    $this->breadcrumbs=array(
        "List ".$user =>array('index','id'=>$hak_akses),
        $user." baru"
);
?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . ' alert alert-danger">' . $message . "</div>\n";
    }
?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'pegawai-grid',
	'dataProvider'=>$model_marketing->searchForUser(),
	'filter'=>$model_marketing,
    'filterPosition'=>'footer',
    'type'=>'bordered striped',
	'columns'=>array(
		'nama',
		'NIP',		
		 array(
                'name'=>'level_jabatan',   
                'value'=>'empty($data->rLevJab->nama_jabatan)?"Reset":$data->rLevJab->nama_jabatan',
                ),	
        array(
        'header' => 'Action',
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{view}',
                        'viewButtonIcon' => 'icon-user',
                        'viewButtonLabel' => "Tambah ke ".$user,
                        'viewButtonUrl'=>'Yii::app()->createUrl("mgUser/afSel", array("id" =>$data[\'pegawai_id\'],"ha"=>'.$hak_akses.'))',
			'htmlOptions' => array(
			  //  'width' => '6%',
			  //  'align' => 'center',
			),
        ),
	),
)); ?>