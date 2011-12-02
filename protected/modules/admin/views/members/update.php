<?php
$this->breadcrumbs=array(
	'Members'=>array('index'),
	$model->name=>array('view','id'=>$model->MID),
	'Update',
);

$this->menu=array(
	array('label'=>'Учасники', 'url'=>array('admin')),
	array('label'=>'Добавить участника', 'url'=>array('create')),
	array('label'=>'Просмотр данных участника', 'url'=>array('view', 'id'=>$model->MID)),
);
?>

<h1>Обновить данные участника <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>