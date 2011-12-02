<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Участники', 'url'=>array('admin')),
	array('label'=>'Добавить участника', 'url'=>array('create')),
	array('label'=>'Обновить данные участника', 'url'=>array('update', 'id'=>$model->MID)),
	array('label'=>'Удалить участника', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->MID),'confirm'=>'Вы уверены, что хотите удалить участника?')),
);
?>

<h1>Просмотр данных участника</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'name',
	),
)); ?>
