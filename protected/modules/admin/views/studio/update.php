<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии'=>array('index'),
	$model->title=>array('view','id'=>$model->SID),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Студии', 'url'=>array('admin')),
	array('label'=>'Добавить студию', 'url'=>array('create')),
	array('label'=>'Просмотр студии', 'url'=>array('view', 'id'=>$model->SID)),
);
?>

<h1>Редактировать студию &laquo;<?php echo $model->title; ?>&raquo;</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>