<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('segmen_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->segmen_id),array('view','id'=>$data->segmen_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>