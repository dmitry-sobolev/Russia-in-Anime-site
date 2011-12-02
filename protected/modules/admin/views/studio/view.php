<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Студии', 'url'=>array('admin')),
	array('label'=>'Добавить студию', 'url'=>array('create')),
	array('label'=>'Обновить студию', 'url'=>array('update', 'id'=>$model->SID)),
	array('label'=>'Удалить студию', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SID),'confirm'=>'Вы правда хотите удалить эту студию из базы данных?')),
);
?>

<h1>Просмотр студии &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'title',
	),
)); ?>

<h2>Статьи, в которых упоминалась эта студия:</h2>

<ul>
<?php foreach ($model->articles as $article): ?>
    <li><?php echo CHtml::link($article->titleMain, array('article/view', 'id' => $article->AID)); ?></li>
<?php endforeach; ?>
</ul>
