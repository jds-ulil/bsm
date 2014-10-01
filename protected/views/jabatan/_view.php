<div class="view">
     <dl class="dl-horizontal">
        <dt><b><?php echo CHtml::encode($data->getAttributeLabel('nama_jabatan')); ?>:</b></dt>
        <dd><?php echo CHtml::link(CHtml::encode($data->nama_jabatan), array('view', 'id'=>$data->id_jabatan)); ?></dd>    
    </dl> 

</div>