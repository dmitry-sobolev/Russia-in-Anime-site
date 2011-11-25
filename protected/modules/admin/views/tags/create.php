<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Теги'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Список тегов', 'url'=>array('index')),
	array('label'=>'Поиск тегов', 'url'=>array('admin')),
);
?>

<h1>Добавить тег</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>