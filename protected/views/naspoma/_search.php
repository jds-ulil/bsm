<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'type'=>'horizontal',
)); ?>
    
 <?php
  /* variable search :
   *        unit_kerja marketing
   *        nama
   *        segmen 
   *        jenis_pembiayaan
   *        jenis_usaha
   *        kolektibilitas
   */       
 ?>

<?php 
        //-------------UNIT KERJA-------------------//
    echo $form->dropDownListRow($model,'unit_kerja', $listUnit, array(
        'empty'=>'Semua Unit Kerja',
            'class'=>'span6',
            )); ?>


<!---------------------NAMA NASABAH---------------------------->
<div class="control-group">
    <label for="naspoma_nama_nasabah" class="control-label">Nama</label>
    <div class="controls">    
        <?php 
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
            'model'=>$model->nama,           
            'name'=>'naspoma[nama]',
            'source'=>$this->createUrl('naspoma/autocompleteNasabah'),
            'options'=>array(
                'delay'=>150,
                'minLength'=>1,
                'showAnim'=>'fold',
                'focus'=>'js:function(event, ui) {   
                    $("#naspoma_nama").val(ui.item.label);                     
                    return false;
                }',
                'select'=>"js:function(event, ui) {                          
                    return false;
                }",
            ),
            'htmlOptions'=>array(
                'class' => 'span6',
                'style'=>'height:20px;',
                'placeholder'=>$model->nama,
            ),
        ));
	?>
    </div>
</div> <!--end nama nasabah-->


<?php 
        //-------------SEGMEN-------------------//
    echo $form->dropDownListRow($model, 'segmen', $listSegmen, array(
        'empty'=>'Semua Segmen',
            'class'=>'span6',
            )); ?>


<?php 
        //-------------JENIS PEMBIAYAAN-------------------//
    echo $form->dropDownListRow($model,'jenis_pembiayaan', $listPembiayaan, array(
        'empty'=>'Semua Jenis Pembiayaan',
            'class'=>'span6',
            )); ?>


<?php   //-------------JENIS USAHA---------------------//
    echo $form->textFieldRow($model,'jenis_usaha',array('class'=>'span6')); ?>	

<?php 
        //-------------KOLEKTIBILITAS-------------------//
    echo $form->dropDownListRow($model,'kolektibilitas_terakhir', $listKolektibilitas, array(
        'empty'=>'Semua Kolektibilitas',
            'class'=>'span6',
            )); ?>


<div class="form-actions">
    <?php  //------------BUTTON---------//      
        $this->widget('bootstrap.widgets.TbButton', array(
                    'buttonType'=>'submit',
                    'type'=>'danger',
                    'label'=>'Buat Laporan',
                    ));              
                    ?>
</div> <!-- end form-actions -->

<?php $this->endWidget(); ?>
