<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Добавить участника', 'url'=>array('create')),
);

?>

<h1>Участники</h1>

<p>
    Вы можете ввести операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    или <b>=</b>) перед каждым запросом для того, чтобы уточнить как должен проводиться поиск.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'members-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'MID',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
