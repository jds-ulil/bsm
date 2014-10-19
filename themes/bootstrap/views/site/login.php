<div class="loginPage">
    <div class="row">
        <div class="span2"><img src="images/logo_bsm.jpg"></div>
        <div class="span6">
            <div class="row">
                <div class="span6 text-center"><h1>SADar NaDi kAla PenTiNG</h1></div>
                <div class="span6 text-center"><h5>Sistem Aplikasi Nasabah Ditolak,Menunggak Akhir Bulan & Pelunasan Tidak Normal/<i>Strange</i></h5></div>
            </div>
        </div>
        <div class="span2">
            <img src="images/year.png" width="150px">
        </div> 
        </div>
    <div class="row">        
        <div class="span offset2">
        
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'login-form',
    'type'=>'horizontal',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

            <p class="note loginText">&nbsp;</p>                    

	<?php echo $form->textFieldRow($model,'username', array(    
            'hint'=>'Sama dengan username email<br/>
                    Contoh:<b>alamatemail</b> abc@bsm.co.id, maka username adalah <b>abc</b>',
            'labelOptions' => array(
                'class'=>'loginTextName'            
          ),
    )); ?>
    <div class="loginText">
	<?php echo $form->passwordFieldRow($model,'password',array(            
       
        'labelOptions' => array (
            'class' => 'loginTextName',
        ),
    )); ?>
    </div>    
	<?php //echo $form->checkBoxRow($model,'rememberMe', array (            
          //  'class' => 'loginTextName',        
   // )); ?>        	
                    <div class="control-group ">
                                &nbsp;
                    <div class="controls">           
                        <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
                        'type'=>'danger',
                        'label'=>'LOGIN',
                    )); ?>	
                    </div>
                    </div>
            
<?php $this->endWidget(); ?>
        </div>
    </div>
</div>