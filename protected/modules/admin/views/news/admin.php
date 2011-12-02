<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Добавить новость', 'url'=>array('create')),
);

?>

<h1>Новости</h1>

<p>
    Вы можете ввести операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) перед каждым запросом для того, чтобы уточнить как должен проводиться поиск.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NID',
		'date',
		'text',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
