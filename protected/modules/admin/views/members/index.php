<?php
$this->breadcrumbs=array(
	'Members',
);

$this->menu=array(
	array('label'=>'Добавить участников', 'url'=>array('create')),
	array('label'=>'Участники', 'url'=>array('admin')),
);
?>

<h1>Список участников</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
