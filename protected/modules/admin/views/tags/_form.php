<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tags-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные звездочкой (<span class="required">*</span>), обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->