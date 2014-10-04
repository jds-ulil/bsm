<div class="loginPage">
<h1 class="loginHead">Login Form</h1>

<p class="loginText">Silahkan isi kolom dibawah dengan data login anda:</p>

<div class="form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note loginText">Kolom dengan tanda <span class="required">*</span> harus di isi.</p>

	<?php echo $form->textFieldRow($model,'username', array(        
            'labelOptions' => array(
                'class'=>'loginTextName'            
          ),
    )); ?>
    <div class="loginText">
	<?php echo $form->passwordFieldRow($model,'password',array(            
        'hint'=>'User/Password Case Sensitive',
        'labelOptions' => array (
            'class' => 'loginTextName',
        ),
    )); ?>
    </div>
    <div class="loginTextName">
	<?php echo $form->checkBoxRow($model,'rememberMe', array (            
            'class' => 'loginTextName',        
    )); ?>
        </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'label'=>'Login',
        )); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>