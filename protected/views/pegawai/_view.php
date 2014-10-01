<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('pegawai_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->pegawai_id),array('view','id'=>$data->pegawai_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_urut')); ?>:</b>
	<?php echo CHtml::encode($data->no_urut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama')); ?>:</b>
	<?php echo CHtml::encode($data->nama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NIP')); ?>:</b>
	<?php echo CHtml::encode($data->NIP); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabatan')); ?>:</b>
	<?php echo CHtml::encode($data->jabatan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_handphone')); ?>:</b>
	<?php echo CHtml::encode($data->no_handphone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('unit_kerja')); ?>:</b>
	<?php echo CHtml::encode($data->unit_kerja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_atasan')); ?>:</b>
	<?php echo CHtml::encode($data->email_atasan); ?>
	<br />

	*/ ?>

</div>