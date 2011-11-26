<div class="form">

<?php
$form = $this->beginWidget('admin.components.CActiveFormExt', array(
    'id' => 'studio-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
));
?>

<p class="note">Поля, отмеченные звездочкой (<span class="required">*</span>), обязательны для заполнения.</p>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
</div>

<?php echo $form->errorSummary($model); ?>
<fieldset>
    <div class="row">
        <?php echo $form->labelEx($model, 'titleMain'); ?>
        <?php echo $form->textField($model, 'titleMain', array('size' => 45, 'maxlength' => 100, 'class' => 'title')); ?>
        <?php echo $form->error($model, 'titleMain'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'titleAdd'); ?>
        <?php echo $form->textField($model, 'titleAdd', array('size' => 45, 'maxlength' => 100, 'class' => 'title')); ?>
        <?php echo $form->error($model, 'titleAdd'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'titleRus'); ?>
        <?php echo $form->textField($model, 'titleRus', array('size' => 45, 'maxlength' => 100, 'class' => 'title')); ?>
        <?php echo $form->error($model, 'titleRus'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'timeTag'); ?>
        <?php echo $form->textField($model, 'timeTag', array('size' => 45, 'maxlength' => 15)); ?>
        <?php echo $form->error($model, 'timeTag'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'format'); ?>
        <?php echo $form->dropDownList($model, 'format', array('ova' => 'OVA', 'tv' => 'Сериал', 'movie' => 'Фильм',)) ?>
        <?php echo $form->textField($model, 'episodeNum', array('size' => 5, 'maxlength' => 5)); ?> серий
        <?php echo $form->error($model, 'format'); ?>
        <?php echo $form->error($model, 'episodeNum'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'studio'); ?>
        <?php $this->widget('admin.components.Relation', array(
            'model' => 'Article',
            'relation' => 'studio0',
            'relatedPk' => 'SID',
            'parentObjects' => $model->studio,
            'fields' => 'title',
            'allowEmpty' => true,
            'showAddButton' => '+',
            'htmlOptions' => array(
                'options' => array($model->studio => array('selected' => true)),
            ),
        )); ?>
        <?php //echo $form->errorSummary($model, 'studio'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'director'); ?>
        <?php echo $form->textField($model, 'director', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'director'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'original'); ?>
        <?php echo $form->textField($model, 'original', array('size' => 45, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'original'); ?>
    </div>
</fieldset>
    
<?php $num = 0; ?>
<?php foreach ($model->fields as $field): ?>
    <?php $num = isset($field->FID) ? $field->FID : $num + 1; ?>
    <?php echo $this->renderPartial('_formField', 
            array(
                'field' => $field, 
                'form' => $form,
                'num' => $num
    )); ?>
<?php endforeach; ?>

<div class="row buttons">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить'); ?>
    <?php echo CHtml::submitButton('Добавить поле', array('name' => 'addField')); ?>
</div>

<?php
$this->endWidget();
?>

</div>