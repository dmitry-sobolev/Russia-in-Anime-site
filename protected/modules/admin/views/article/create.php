<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Статьи'=>array('/article'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Поиск статьи', 'url'=>array('admin')),
);
?>
<h1>Добавить статью</h1>

<?php echo $this->renderPartial('_formAdd', array('model' => $model)); ?>