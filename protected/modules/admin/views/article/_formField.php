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
            <?php echo $form->labelEx($field, "tags[{$field->FID}]"); ?>
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
                'htmlOptions' => array(
                    'options' => $options,
                ),
            )); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "picturePreview[{$field->FID}]"); ?>
            <?php $this->widget('admin.components.Relation', array(
                'model' => "Field",
                'relation' => 'picturePreview0',
                'showAddButton' => false,
                'fields' => 'title',
                'htmlOptions' => array(
                    'options' => array($field->picturePreview => array('selected' => true)),
                ),
            )); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "textPreview[{$field->FID}]"); ?>
            <?php echo $form->textArea($field, "textPreview[{$field->FID}]"); ?>
        </div>
        <div class="row">
            <?php echo $form->checkBox($field, "isBig[{$field->FID}]"); ?>
            <?php echo $form->labelEx($field, "isBig[{$field->FID}]"); ?>
            
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "text[{$field->FID}]"); ?>
            <?php echo $form->textArea($field, "text[{$field->FID}]"); ?>
            <?php echo $form->hiddenField($field, "FID[{$field->FID}]"); ?>
        </div>
    </div>
    <div class="span-6 last">
        
    </div>
</div>