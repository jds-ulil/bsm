<?php
/* @var $this MtbUserController */
/* @var $data MtbUser */
?>
<style>
    .listHead {
        color: #53A627;
        font-family: serif;
        font-size: 1.5em;
        text-transform: uppercase;        
    }
</style>
<span class="listHead"><?php echo CHtml::link(CHtml::encode($data->nama),array('view','id'=>$data->nasabah_id)); ?></span>
<hr>
    
<dl class="dl-horizontal">        
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('kartukeluarga_id')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->kartukeluarga_id); ?></dd>       
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->alamat); ?></dd>
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->sNas->nama_status); ?></dd>
    </dl>            