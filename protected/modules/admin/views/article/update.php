<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Статьи'=>array('index'),
	$model->titleMain=>array('view','id'=>$model->AID),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Список статей', 'url'=>array('index')),
	array('label'=>'Добавить статью', 'url'=>array('create')),
	array('label'=>'Просмотр статьи', 'url'=>array('view', 'id'=>$model->AID)),
	array('label'=>'Поиск статьи', 'url'=>array('admin')),
);
?>

<h1>Редактировать статью &laquo;<?php echo $model->titleMain; ?>&raquo;</h1>

<?php echo $this->renderPartial('_formAdd', array('model'=>$model)); ?>