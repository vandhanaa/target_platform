<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID),array('view','id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NAR_ID')); ?>:</b>
	<?php echo CHtml::encode($data->NAR_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOMAIN')); ?>:</b>
	<?php echo CHtml::encode($data->DOMAIN); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INSTANCE_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->INSTANCE_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REPORTING_UNIT')); ?>:</b>
	<?php echo CHtml::encode($data->REPORTING_UNIT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PRIMARILY_AFFECTED_BIZ_AREA')); ?>:</b>
	<?php echo CHtml::encode($data->PRIMARILY_AFFECTED_BIZ_AREA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INSTANCE_INVESTMENT_STRATEGY')); ?>:</b>
	<?php echo CHtml::encode($data->INSTANCE_INVESTMENT_STRATEGY); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('APP_CRITICALITY_CLASS')); ?>:</b>
	<?php echo CHtml::encode($data->APP_CRITICALITY_CLASS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INSTANCE_DESCRIPTION')); ?>:</b>
	<?php echo CHtml::encode($data->INSTANCE_DESCRIPTION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RTB_EXTERNAL')); ?>:</b>
	<?php echo CHtml::encode($data->RTB_EXTERNAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RTB_INTERNAL')); ?>:</b>
	<?php echo CHtml::encode($data->RTB_INTERNAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RTB_LICENSE')); ?>:</b>
	<?php echo CHtml::encode($data->RTB_LICENSE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CTB_EXTERNAL')); ?>:</b>
	<?php echo CHtml::encode($data->CTB_EXTERNAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CTB_INTERNAL')); ?>:</b>
	<?php echo CHtml::encode($data->CTB_INTERNAL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CTB_LICENSE')); ?>:</b>
	<?php echo CHtml::encode($data->CTB_LICENSE); ?>
	<br />

	*/ ?>

</div>