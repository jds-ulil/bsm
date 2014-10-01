<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_kerja_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->unit_kerja_id),array('view','id'=>$data->unit_kerja_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />


</div>