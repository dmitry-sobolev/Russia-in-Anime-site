<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h1>Страница администратора</h1>

<ul class="menu-map">
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('article/add'); ?>">Добавить статью</a> - добавление новой статьи</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('article/manage'); ?>">Найти статью</a> - поиск статей и возможность применения различных операций (удаление, редактироание, просмотр) к ним</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('tags/add'); ?>">Добавить тег</a> - добавление новго тега</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('tags/manage'); ?>">Найти теги</a> - поиск и оперирование тегами</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('studio/add'); ?>">Добавить студию</a> - добавление новой студии в список</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('studio/manage'); ?>">Найти студию</a> - поиск и оперирование студиями</li>
</ul>
