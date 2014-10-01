<div class="view">
     <dl class="dl-horizontal">
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b></dt>
        <dd><a href="mailto:<?php echo CHtml::encode($data->email_address); ?>"><?php echo CHtml::encode($data->email_address); ?></a></dd>        
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('nama_pengguna')); ?>:</b></dt>
        <dd><?php echo CHtml::link(CHtml::encode($data->nama_pengguna), array('view', 'id'=>$data->id_list_email)); ?></dd>
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('jabatan_id')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->rJab->nama_jabatan); ?></dd>
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b></dt>
        <dd><?php echo CHtml::encode($data->getStatus($data->status)); ?></dd>
    </dl>     	
</div>