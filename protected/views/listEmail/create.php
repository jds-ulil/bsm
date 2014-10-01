<?php
$this->breadcrumbs=array(
	'List Email'=>array('index'),
	'Tambah',
);

$this->menu=array(
	array('label'=>'Daftar List Email','url'=>array('index')),
	//array('label'=>'Manajemen List Email','url'=>array('admin')),
);
?>

<h1>Tambah Email Address</h1>

<?php echo $this->renderPartial('_form', 
        array('model'=>$model,
                'list'=>$list,
                'listNotif'=>$listNotif,
            
        )
        ); ?>