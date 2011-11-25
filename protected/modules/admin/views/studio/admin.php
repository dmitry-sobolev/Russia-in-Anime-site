<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии'=>array('index'),
	'Поиск',
);

$this->menu=array(
	array('label'=>'Список студий', 'url'=>array('index')),
	array('label'=>'Добавить студию', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('studio-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Поиск студии</h1>

<p>
Вы можете ввести операторы сравнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>) перед каждым запросом для того, чтобы уточнить как должен проводиться поиск.
</p>

<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'studio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'SID',
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
