<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('kolektabilitas_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->kolektabilitas_id),array('view','id'=>$data->kolektabilitas_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>