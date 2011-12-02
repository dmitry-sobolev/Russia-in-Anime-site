<?php
$this->breadcrumbs=array(
        'Главная'=>array('default/index'),
	'Студии'=>array('index'),
	'Добавить',
);

$this->menu=array(
	array('label'=>'Студии', 'url'=>array('admin')),
);
?>

<h1>Добавить студию</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>