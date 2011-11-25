<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии',
);

$this->menu=array(
	array('label'=>'Добавить студию', 'url'=>array('create')),
	array('label'=>'Поиск студии', 'url'=>array('admin')),
);
?>

<h1>Список студий</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
