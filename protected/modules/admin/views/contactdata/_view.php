<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('general')); ?>:</b>
	<?php echo CHtml::encode($data->general); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jobs')); ?>:</b>
	<?php echo CHtml::encode($data->jobs); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('partnership')); ?>:</b>
	<?php echo CHtml::encode($data->partnership); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adress')); ?>:</b>
	<?php echo CHtml::encode($data->adress); ?>
	<br />


</div>