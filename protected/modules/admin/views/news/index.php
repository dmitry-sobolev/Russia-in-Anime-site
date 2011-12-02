<?php
$this->breadcrumbs=array(
	'News',
);

$this->menu=array(
	array('label'=>'Добавить новость', 'url'=>array('create')),
	array('label'=>'Новости', 'url'=>array('admin')),
);
?>

<h1>Список новостей</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
