<?php
$this->breadcrumbs = array(
    $this->module->id,
);
?>
<h1>Страница администратора</h1>

<ul class="menu-map">
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('admin/article/create'); ?>">Добавить статью</a> - добавление новой статьи</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('admin/article/admin'); ?>">Найти статью</a> - поиск статей и возможность применения различных операций (удаление, редактироание, просмотр) к ним</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('admin/tags/create'); ?>">Добавить тег</a> - добавление новго тега</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('admin/tags/admin'); ?>">Найти теги</a> - поиск и оперирование тегами</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('admin/studio/create'); ?>">Добавить студию</a> - добавление новой студии в список</li>
    <li><a href="<?php echo Yii::app()->urlManager->createUrl('admin/studio/admin'); ?>">Найти студию</a> - поиск и оперирование студиями</li>
</ul>
