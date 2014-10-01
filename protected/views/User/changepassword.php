<?php
/* @var $this MtbUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Akun'=>array('setting'),	    
	'Ganti Password',
);

$this->menu=array(
	array('label'=>'Akun', 'url'=>array('setting')),	
);

?>

<h1>Ganti Password</h1>

<div class="form">
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'mtb-user-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        ),
)); ?>
    <?php echo $form->errorSummary($model); ?>
    <?php echo $form->passwordFieldRow($model,'password',array('class'=>'span3')); ?>   
    <?php echo $form->passwordFieldRow($model,'confirmPass',array('class'=>'span3')); ?>

<div class="form-actions">		
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Tambah' : 'Simpan',
		)); ?>		
	</div>

<?php $this->endWidget(); ?>
</div>

