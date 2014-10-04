<?php
/* @var $this MtbUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Akun'
);

$this->menu=array(
	array('label'=>'Ganti Password', 'url'=>array('changepassword')),	
);

?>

<h1>Akun Detail</h1>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
//	'type'=>'bordered striped',
	'data'=>$model,
	'attributes'=>array(
		//'user_id',                               
		'user_name',
                'NIP',
                'rJab.nama_jabatan',                               
		'email_address',		
		//'password',
		'rHak.nama_hak_akses',		
	),
)); ?>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
