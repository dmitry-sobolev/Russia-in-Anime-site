<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Участники', 'url'=>array('admin')),
);
?>

<h1>Добавить участника</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>