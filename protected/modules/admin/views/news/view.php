<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->NID,
);

$this->menu=array(
	array('label'=>'Новости', 'url'=>array('admin')),
	array('label'=>'Добавить новость', 'url'=>array('create')),
	array('label'=>'Обновить новость', 'url'=>array('update', 'id'=>$model->NID)),
	array('label'=>'Удалить новость', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NID),'confirm'=>'Вы уверены, что хотите удалить новость?')),
);
?>

<h1>Просмотр новости</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'date',
		'text',
	),
)); ?>
