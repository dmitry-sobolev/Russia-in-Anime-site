<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TID), array('view', 'id'=>$data->TID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />


</div>