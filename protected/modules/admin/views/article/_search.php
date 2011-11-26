<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'titleMain'); ?>
		<?php echo $form->textField($model,'titleMain',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'titleAdd'); ?>
		<?php echo $form->textField($model,'titleAdd',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'titleRus'); ?>
		<?php echo $form->textField($model,'titleRus',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'timeTag'); ?>
		<?php echo $form->textField($model,'timeTag',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'format'); ?>
		<?php echo $form->dropDownList($model,'format',array('ova' => 'OVA', 'tv' => 'Сериал', 'movie' => 'Фильм')); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'director'); ?>
		<?php echo $form->textField($model,'director',array('size'=>45,'maxlength'=>45)); ?>
	</div>
	<div class="row">
		<?php echo $form->label($model,'original'); ?>
		<?php echo $form->textField($model,'original',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Искать'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->