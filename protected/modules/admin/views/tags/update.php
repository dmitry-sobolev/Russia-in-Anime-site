<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Теги'=>array('index'),
	$model->title=>array('view','id'=>$model->TID),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список тегов', 'url'=>array('index')),
	array('label'=>'Добавить тег', 'url'=>array('create')),
	array('label'=>'Просмтр тега', 'url'=>array('view', 'id'=>$model->TID)),
	array('label'=>'Поиск тегов', 'url'=>array('admin')),
);
?>

<h1>Редактировать тег &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>