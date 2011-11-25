<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Tags',
);

$this->menu=array(
	array('label'=>'Create Tags', 'url'=>array('create')),
	array('label'=>'Manage Tags', 'url'=>array('admin')),
);
?>

<h1>Tags</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
