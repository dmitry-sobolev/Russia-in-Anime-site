<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->NID=>array('view','id'=>$model->NID),
	'Update',
);

$this->menu=array(
	array('label'=>'Новости', 'url'=>array('admin')),
	array('label'=>'Добавить новость', 'url'=>array('create')),
	array('label'=>'Просмотр новости', 'url'=>array('view', 'id'=>$model->NID)),
);
?>

<h1>Обновить новость</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>