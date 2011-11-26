<div class="field clearfix">

    <div class="delete">
        <?php if (!$field->isNewRecord): ?>
            <?php echo CHtml::label('Удалить', "delete[$num]"); ?>
            <?php echo CHtml::checkBox("delete[$num]") ?>
        <?php endif; ?>
    </div>

    <h2>Поле <?php echo $num; ?></h2>

    <div class="span-13">
        <div class="row">
            <?php echo $form->labelEx($field, "[$num]tags"); ?>
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
                'modelId' => $num,
                'htmlOptions' => array(
                    'options' => $options,
                ),
            )); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "[$num]picturePreview"); ?>
            <?php $this->widget('admin.components.Relation', array(
                'model' => "Field",
                'relation' => 'picturePreview0',
                'showAddButton' => false,
                'fields' => 'title',
                'parentObjects' => $field->pictures,
                'modelId' => $num,
                'htmlOptions' => array(
                    'options' => array($field->picturePreview => array('selected' => true)),
                ),
            )); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "[$num]textPreview"); ?>
            <?php echo $form->textArea($field, "[$num]textPreview"); ?>
        </div>
        <div class="row">
            <?php echo $form->checkBox($field, "[$num]isBig"); ?>
            <?php echo $form->labelEx($field, "[$num]isBig"); ?>
            
        </div>
        <div class="row">
            <?php echo $form->labelEx($field, "[$num]text"); ?>
            <?php echo $form->textArea($field, "[$num]text"); ?>
            <?php echo $form->hiddenField($field, "[$num]FID"); ?>
        </div>
    </div>
    <div class="span-6 last">
        <h3>Картинки</h3>
        <div class="image-items">
            <?php foreach ($field->pictures as $picture): ?>
            <div class="image">
                <?php $imgpath = $picture->path.$picture->title; ?>
                <?php $thumbpath = $picture->path.'thumbs/thumb200_'.$picture->title; ?>
                <?php echo CHtml::link(
                        CHtml::image($thumbpath, $picture->title), 
                        $imgpath); 
                ?>
            </div>
            <?php endforeach;?>
        </div>
        <?php echo CHtml::activeFileField(Pictures::model(), "$num"); ?>
    </div>
</div>