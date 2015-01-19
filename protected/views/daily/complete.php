<style>
    .selesai img{
        max-height: 17px;
    }
</style>

<?php
// breadcrump 
$this->breadcrumbs=array(	
    "Proses Input Selesai"
);
?>

<div class="alert alert-success selesai">
    Laporan Berhasil Disimpan <img src = "<?php echo yii::app()->baseUrl."/images/dailymenu/check.png"; ?>" />
</div>

<div class="form-actions">
    <?php echo CHtml::link('Selesai',array('daily/index'), array('class'=>'btn btn-success')); ?>        
</div>