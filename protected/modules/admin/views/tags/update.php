<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Теги'=>array('index'),
	$model->title=>array('view','id'=>$model->TID),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Теги', 'url'=>array('admin')),
	array('label'=>'Добавить тег', 'url'=>array('create')),
	array('label'=>'Просмтр тега', 'url'=>array('view', 'id'=>$model->TID)),
);
?>

<h1>Редактировать тег &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>