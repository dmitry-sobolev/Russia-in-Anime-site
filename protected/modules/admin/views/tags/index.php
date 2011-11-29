<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Теги',
);

$this->menu=array(
	array('label'=>'Добавить тег', 'url'=>array('create')),
	array('label'=>'Найти тег', 'url'=>array('admin')),
);
?>

<h1>Список тегов</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
