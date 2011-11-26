<div class="field clearfix">

    <div class="delete">
        <?php if (!$field->isNewRecord): ?>
            <?php echo CHtml::label('Удалить', "delete[{$field->FID}]"); ?>
            <?php echo CHtml::checkBox("delete[{$field->FID}]") ?>
        <?php endif; ?>
    </div>

    <h2>Поле <?php echo $num; ?></h2>

    <div class="span-13">
        <div class="row">
            <?php echo $form->labelEx($field, "[{$field->FID}]tags"); ?>
            <?php $options = array(); ?>
            <?php foreach ($field->tags as $tag): ?>
                <?php $options[$tag->TID] = array('selected' => true); ?>
            <?php endforeach; ?>
            <?php 
            
            $this->widget('admin.components.Relation', array(
                'model' => "Field",
                'relation' => 'tags',
                'relatedPk' => 'TID',
                'showAddButton' => false,
                'fields' => 'title',
                'style' => 'listBox',
                'modelId' => $field->FID,
                'htmlOptions' => array(
                    'options' => $options,
                ),
            )); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "[{$field->FID}]picturePreview"); ?>
            <?php $this->widget('admin.components.Relation', array(
                'model' => "Field",
                'relation' => 'picturePreview0',
                'showAddButton' => false,
                'fields' => 'title',
                'modelId' => $field->FID,
                'htmlOptions' => array(
                    'options' => array($field->picturePreview => array('selected' => true)),
                ),
            )); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "[{$field->FID}]textPreview"); ?>
            <?php echo $form->textArea($field, "[{$field->FID}]textPreview"); ?>
        </div>
        <div class="row">
            <?php echo $form->checkBox($field, "[{$field->FID}]isBig"); ?>
            <?php echo $form->labelEx($field, "[{$field->FID}]isBig"); ?>
            
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "[{$field->FID}]text"); ?>
            <?php echo $form->textArea($field, "[{$field->FID}]text"); ?>
            <?php echo $form->hiddenField($field, "[{$field->FID}]FID"); ?>
        </div>
    </div>
    <div class="span-6 last">
        
    </div>
</div>