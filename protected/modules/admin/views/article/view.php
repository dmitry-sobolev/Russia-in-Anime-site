<?php
$this->breadcrumbs = array(
    'Главная' => array('default/index'),
    'Студии' => array('index'),
    $model->titleMain,
);

$this->menu = array(
    array('label' => 'Статьи', 'url' => array('admin')),
    array('label' => 'Добавить статью', 'url' => array('create')),
    array('label' => 'Обновить статью', 'url' => array('update', 'id' => $model->AID)),
    array('label' => 'Удалить статью', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->AID), 'confirm' => 'Вы правда хотите удалить эту статью из базы данных?')),
);
?>

<h1>Просмотр статьи &laquo;<?php echo $model->titleMain; ?>&raquo;</h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'titleMain',
        'titleAdd',
        'titleRus',
        'timeTag',
        array(
            'name' => 'format',
            'value' => $model->format0->title,
        ),
    ),
));
?>


<?php foreach ($model->fields as $key => $field): ?>
    <h2>Поле <?php echo $key + 1 ?></h2>
    <?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $field,
        'attributes' => array(
            'textPreview',
            array(
                'name' => 'isBig',
                'value' => $field->isBig ? 'Да' : 'Нет',
            ),
            'text',
        ),
    ));
    ?>
<?php endforeach; ?>

