<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Теги'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Список тегов', 'url'=>array('index')),
	array('label'=>'Добавить тег', 'url'=>array('create')),
	array('label'=>'Редактировать тег', 'url'=>array('update', 'id'=>$model->TID)),
	array('label'=>'Удалить тег', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TID),'confirm'=>'Вы правда хотите удалить этот тег из базы данных?')),
	array('label'=>'Поиск тегов', 'url'=>array('admin')),
);
?>

<h1>View Tags #<?php echo $model->TID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TID',
		'title',
	),
)); ?>
