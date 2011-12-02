<div class="form">
    
<?php
    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/chosen.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/chosen/chosen.jquery.min.js');
    Yii::app()->clientScript->registerScript('chosen-init', "
$(document).ready(function(){
    function showEpisodeNum() {
        if ($('#Article_format option:selected').val() == 1 || $('#Article_format option:selected').val() == 2)
            $('#id_episode_num').css('visibility', 'visible');
        else
            $('#id_episode_num').css('visibility', 'hidden');
    }

    $('select[multiple]').chosen();
    showEpisodeNum();
    $('#Article_format').change(function(){
        showEpisodeNum();
    });
});
");
?>

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
        <?php echo $form->labelEx($model, 'year'); ?>
        <?php echo $form->textField($model, 'year', array('size' => 4, 'maxlength' => 4)); ?>
        <?php echo $form->error($model, 'year'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'timeTag'); ?>
        <?php echo $form->textField($model, 'timeTag', array('size' => 45, 'maxlength' => 15)); ?>
        <?php echo $form->error($model, 'timeTag'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'format'); ?>
        <?php $this->widget('admin.components.Relation', array(
            'model' => $model,
            'relation' => 'format0',
            'relatedPk' => 'FtID',
            'fields' => 'title',
            'showAddButton' => false,
            'htmlOptions' => array(
                'options' => array($model->format => array('selected' => true)),
            ),
        )); ?>
        <span id="id_episode_num" style="visibility: hidden;">
            <?php echo $form->textField($model, 'episodeNum', array('size' => 5, 'maxlength' => 5)); ?> серий
        </span>
        <?php echo $form->error($model, 'format'); ?>
        <?php echo $form->error($model, 'episodeNum'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'studio'); ?>
        <?php $this->widget('admin.components.Relation', array(
            'model' => $model,
            'relation' => 'studio0',
            'relatedPk' => 'SID',
            'fields' => 'title',
            'allowEmpty' => true,
            'showAddButton' => '+',
            'htmlOptions' => array(
                'options' => array($model->studio => array('selected' => true)),
            ),
        )); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'director'); ?>
        <?php echo $form->textField($model, 'director', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'director'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'scriptWriter'); ?>
        <?php echo $form->textField($model, 'scriptWriter', array('size' => 45, 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'scriptWriter'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'originalRole'); ?>
        <?php $this->widget('admin.components.Relation', array(
            'model' => $model,
            'relation' => 'originalRole0',
            'relatedPk' => 'ORID',
            'fields' => 'title',
            'showAddButton' => false,
            'htmlOptions' => array(
                'options' => array($model->originalRole => array('selected' => true)),
            ),
        )); ?>
        <?php echo $form->error($model, 'originalRole'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'original'); ?>
        <?php echo $form->textField($model, 'original', array('size' => 45, 'maxlength' => 200)); ?>
        <?php echo $form->error($model, 'original'); ?>
    </div>
    
    <div class="row">
        <?php $pictureArray = array(); ?>
        <?php foreach ($model->fields as $field): ?>
            <?php $pictureArray = array_merge($pictureArray, $field->pictures); ?>
        <?php endforeach; ?>
        
        <?php echo $form->labelEx($model, 'pictureMain'); ?>
        <?php $this->widget('admin.components.Relation', array(
            'model' => $model,
            'relation' => 'pictureMain0',
            'relatedPk' => 'PID',
            'parentObjects' => $pictureArray,
            'fields' => 'title',
            'showAddButton' => false,
            'htmlOptions' => array(
                'options' => array($model->pictureMain => array('selected' => true)),
            ),
        )); ?>
        <?php echo $form->error($model, 'pictureMain'); ?>
    </div>

    <div class="row">
        <?php $pictureArray = array(); ?>
        <?php foreach ($model->fields as $field): ?>
            <?php $pictureArray = array_merge($pictureArray, $field->pictures); ?>
        <?php endforeach; ?>
        
        <?php echo $form->labelEx($model, 'members'); ?>
        <?php $this->widget('admin.components.Relation', array(
            'model' => $model,
            'relation' => 'members',
            'relatedPk' => 'MID',
            'fields' => 'name',
            'style' => 'listBox',
            'showAddButton' => false,
        )); ?>
        <?php echo $form->error($model, 'originalRole'); ?>
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