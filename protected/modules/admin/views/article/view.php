<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии'=>array('index'),
	$model->titleMain,
);

$this->menu=array(
	array('label'=>'Список статью', 'url'=>array('index')),
	array('label'=>'Добавить статью', 'url'=>array('create')),
	array('label'=>'Обновить статью', 'url'=>array('update', 'id'=>$model->AID)),
	array('label'=>'Удалить статью', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->AID),'confirm'=>'Вы правда хотите удалить эту статью из базы данных?')),
	array('label'=>'Поиск стаьи', 'url'=>array('admin')),
);
?>

<h1>Просмотр статьи &laquo;<?php echo $model->titleMain; ?>&raquo;</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'AID',
		'titleMain',
		'titleAdd',
		'titleRus',
                'timeTag',
                'format',
	),
)); ?>


<?php foreach ($model->fields as $field): ?>
    <h2>Поле <?php echo $field->FID; ?></h2>
    <?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$field,
	'attributes'=>array(
		'FID',
		'textPreview',
                'isBig',
                'text',
	),
)); ?>
<?php endforeach; ?>

