<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SID), array('view', 'id'=>$data->SID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />


</div>