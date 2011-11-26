<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список студий', 'url'=>array('index')),
	array('label'=>'Добавить студию', 'url'=>array('create')),
	array('label'=>'Обновить студию', 'url'=>array('update', 'id'=>$model->SID)),
	array('label'=>'Удалить студию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SID),'confirm'=>'Вы правда хотите удалить эту студию из базы данных?')),
	array('label'=>'Поиск студии', 'url'=>array('admin')),
);
?>

<h1>Просмотр студии &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SID',
		'title',
	),
)); ?>
