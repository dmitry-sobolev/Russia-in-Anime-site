<?php
$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Новости', 'url'=>array('admin')),
);
?>

<h1>Добавить новость</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>